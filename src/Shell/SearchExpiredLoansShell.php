<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

/**
 * 2018-07-07 @jmrc92
 * SearchExpiredLoans shell command.
 * This shell is the responsible of change the status of the loans, if the end date is before the actual date.
 * The setup of the shell is planned to be a cronjob.
 */
class SearchExpiredLoansShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();
        
        return $parser;
    }

    /**
     * main() method.
     *
     * @return bool|int|null Success or error code.
     */
    public function main()
    {
        $this->out($this->OptionParser->help());
        
        $today = date('Y-m-d');
        //2018-07-07 @jmrc92 fetching the loans that the endDate is passed, taking reference of the actual date
        $pendantLoans = TableRegistry::getTableLocator()->get('loans')->find('all')
            ->update()
            ->set([
            'expired_loan' => true
        ])
            ->where([
            'active_loan' => true,
            'loan_date_end <' => $today
        ])->execute();
        
    }
    
}
