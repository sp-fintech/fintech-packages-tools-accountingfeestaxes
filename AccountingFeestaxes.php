<?php

namespace Apps\Fintech\Packages\Accounting\Feestaxes;

use Apps\Fintech\Packages\Accounting\Feestaxes\Model\AppsFintechAccountingFeestaxes;
use System\Base\BasePackage;

class AccountingFeestaxes extends BasePackage
{
    protected $modelToUse = AppsFintechAccountingFeestaxes::class;

    protected $packageName = 'accountingfeestaxes';

    public $accountingfeestaxes;

    public function getAccountingFeestaxesById($id)
    {
        $ft = $this->getById($id);

        if ($ft) {
            $this->addResponse('Success', 0, ['fees' => $ft]);

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function addAccountingFeestaxes($data)
    {
        if ($this->add($data)) {
            $this->addResponse('Fees/taxes added successfully');

            return true;
        }

        $this->addResponse('Error adding fees/taxes', 1);

        return false;
    }

    public function updateAccountingFeestaxes($data)
    {
        $ft = $this->getById($data['id']);

        if (!$ft) {
            $this->addResponse('Fees not found', 1);

            return false;
        }

        $ft = array_replace($ft, $data);

        if ($this->update($ft)) {
            $this->addResponse('Fees/taxes added successfully');

            return true;
        }

        $this->addResponse('Error adding fees/taxes', 1);

        return false;
    }

    public function removeAccountingFeestaxes($id)
    {
        $ft = $this->getById($id);

        if (!$ft) {
            $this->addResponse('Fees/taxes not found', 1);

            return false;
        }

        if ($this->remove($ft['id'])) {
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error removing Fees/taxes', 1);
    }
}