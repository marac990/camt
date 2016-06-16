<?php

namespace Genkgo\Camt\Camt054\MessageFormat;

use Genkgo\Camt\Camt054;
use Genkgo\Camt\Decoder;
use Genkgo\Camt\DecoderInterface;
use Genkgo\Camt\MessageFormatInterface;

/**
 * Class MessageFormat
 * @package Genkgo\Camt\camt054
 */
final class V02 implements MessageFormatInterface
{
    /**
     * @return string
     */
    public function getXmlNs()
    {
        return 'urn:iso:std:iso:20022:tech:xsd:camt.054.001.02';
    }

    /**
     * @return string
     */
    public function getMsgId()
    {
        return 'camt.054.001.02';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'BankToCustomerDebitCreditNotificationV02';
    }

    /**
     * @return DecoderInterface
     */
    public function getDecoder()
    {
        $entryTransactionDetailDecoder = new Camt054\Decoder\EntryTransactionDetail();
        $entryDecoder                  = new Decoder\Entry($entryTransactionDetailDecoder);
        $recordDecoder                 = new Decoder\Record($entryDecoder);
        $messageDecoder                = new Camt054\Decoder\Message($recordDecoder);

        return new Decoder($messageDecoder, sprintf('/assets/%s.xsd', $this->getMsgId()));
    }
}
