<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;

/**
 * SearchExpiredLoans shell command.
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
        
        $today = date('Y-m-d h:i:s');
        
        $pendantLoans = TableRegistry::get('loans')->find('all')
            ->update()
            ->set([
            'expired_loan' => true
        ])
            ->where([
            'active_loan' => true,
            'loan_date_end <' => $today
        ])
            ->execute();
        
    }
    
}
