<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class AppServiceProvider extends ServiceProvider {
 public function register(): void {}
 public function boot(): void { Blade::directive('money', fn($e) => "<?php echo 'Rp '.number_format($e,0,',','.'); ?>"); }
}
