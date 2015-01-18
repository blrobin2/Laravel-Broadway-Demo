<?php namespace Modules\Parts;

use Illuminate\Support\ServiceProvider;
use Modules\Parts\Repositories\MysqlEventStorePartRepository;

class PartServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     * @return void
     */
    public function register()
    {
        $this->bindEventSourcedRepositories();
    }

    /**
     * Bind repositories (should be a separate SP)
     */
    private function bindEventSourcedRepositories()
    {
        // Binding the Part Repository
        $this->app->bind('Modules\Parts\Repositories\EventStorePartRepository', function ($app) {
            $eventStore = $app['Broadway\EventStore\EventStoreInterface'];
            $eventBus = $app['Broadway\EventHandling\EventBusInterface'];
            return new MysqlEventStorePartRepository($eventStore, $eventBus);
        });
    }
}
