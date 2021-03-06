<?php
namespace Novadevs\Dolivel\<module-name>\Commands;

use Illuminate\Console\Command;

use Novadevs\Dolivel\Base\Repositories\ModuleRepository;

class InstallModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dolivel-module-install:<module->name>';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Dolivel <module-name> module';

    /**
     * The commands that need to be run.
     *
     * @var array
     */
    protected $commands = [
        'command'
    ];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Handle the command execution persisting the module.
     *
     * @return mixed
     */
    public function handle(ModuleRepository $module)
    {
   
        // Your code

        if ( $module->install() ) { 
            $this->info('Installation completed successfully.');
        } else {
            $this->error('An error happened');
        }
    }

    // Your additional code
}