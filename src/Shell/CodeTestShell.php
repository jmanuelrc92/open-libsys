<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

/**
 * CodeTest shell command.
 */
class CodeTestShell extends Shell
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
        //$this->out($this->OptionParser->help());
        $authorsTable = TableRegistry::get('authors');
        $authors = $authorsTable->find('withFormalName', []);
        $this->out(json_encode($authors));
    }
}
