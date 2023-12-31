<?php

/**
 * LaraClassified - Classified Ads Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Console;

use App\Helpers\Date;
use App\Models\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		\App\Console\Commands\Inspire::class,
		\App\Console\Commands\AdsClear::class,
		\App\Console\Commands\everyDay::class,
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param \Illuminate\Console\Scheduling\Schedule $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		// CLEAR ADS
		$schedule->command('ads:clear')->hourly();
		$schedule->command('day:update')->hourly();

		// BACKUPS
		setBackupConfig();
		$disableNotifications = (config('settings.backup.disable_notifications')) ? ' --disable-notifications' : '';

		// Test CRON
		$schedule->call(function () {
			$new_price = random_int(0, 100000);
			Post::where('email', 'rizwanirfanx@gmail.com')->update(['price' => $new_price]);
		})->everyMinute();
		// TAKING BACKUPS
		$takingBackup = config('settings.backup.taking_backup');
		if ($takingBackup != 'none') {
			$takingBackupAt = config('settings.backup.taking_backup_at');
			$takingBackupAt = ($takingBackupAt != '') ? $takingBackupAt : '00:00';

			if ($takingBackup == 'daily') {
				$schedule->command('backup:run' . $disableNotifications)->dailyAt($takingBackupAt);
			}
			if ($takingBackup == 'weekly') {
				$schedule->command('backup:run' . $disableNotifications)->weeklyOn(1, $takingBackupAt);
			}
			if ($takingBackup == 'monthly') {
				$schedule->command('backup:run' . $disableNotifications)->monthlyOn(1, $takingBackupAt);
			}
			if ($takingBackup == 'yearly') {
				$schedule->command('backup:run' . $disableNotifications)->yearlyOn(1, 1, $takingBackupAt);
			}

			// CLEANING UP OLD BACKUPS
			$schedule->command('backup:clean' . $disableNotifications)->daily();
		}

		// CLEAR CACHE & VIEWS
		if (!env('DISABLE_CACHE_AUTO_CLEAR') || (int)env('DISABLE_CACHE_AUTO_CLEAR', 0) != 1) {
			$schedule->command('cache:clear')->weeklyOn(7, '6:00');
			$schedule->command('cache:clear')->weeklyOn(7, '6:05'); // To prevent file lock issues (Optional)
			$schedule->command('view:clear')->weeklyOn(7, '6:00');
		}
	}

	/**
	 * Register the Closure based commands for the application.
	 *
	 * @return void
	 */
	protected function commands()
	{
		require base_path('routes/console.php');
	}

	/**
	 * Get the timezone that should be used by default for scheduled events.
	 *
	 * @return \DateTimeZone|string|null
	 */
	protected function scheduleTimezone()
	{
		// UTC
		$timeZone = Date::getAppTimeZone();

		return $timeZone;
	}
}
