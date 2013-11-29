<?php
namespace Bav\Backend;

use Bav\Encoder\EncoderInterface;
use Bav\Backend\Parser\BankDataParser;
use Bav\Backend\Context\BankDataContext;

class BankDataResolver implements BankDataResolverInterface
{
	protected $parser;
	protected $bankDataCache;

	/*
	 var $encoder = EncoderFactory::create('ISO...');
	 var $parser = new BankDataParser($fileName);
	 $parser->setEncoder($encoder); // default is ISO...
	 var $resolver = new BankDataResolver($parser);
	 
	 */
	public function __construct($fileName, EncoderInterface $encoder) {
		$this->parser = new BankDataParser($fileName, $encoder);
		$this->bankDataCache = array();
	}
	
	public function getBank($bankId) {
		if (!in_array($bankId, $this->bankDataCache)) {
			$this->bankDataCache[$bankId] = $this->resolveBankData($bankId);
		}
		return $this->bankDataCache[$bankId];
	}

	public function bankExists($bankId) {
		try {
			$this->getBank($bankId);
			return true;
		} catch (Exception\BankNotFoundException $e) {
			return false;
		}
	}

	private function resolveBankData($bankId) {
		try {
			$bank = $this->parser->resolveBank($bankId);
			$agencies = $this->parser->resolveAgencies($bankId);
			$bank->setAgencies($agencies);
			return $bank;
		} catch (Parser\Exception\ParseException $e) {
			throw new \Bav\Exception\IoException();
		}
	}
}