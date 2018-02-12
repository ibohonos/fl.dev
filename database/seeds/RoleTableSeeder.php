<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$role_admin = new Role();
		$role_admin->name = 'Admin';
		$role_admin->slug = 'admin';
		$role_admin->save();

		$role_freelancer = new Role();
		$role_freelancer->name = 'Freelancer';
		$role_freelancer->slug = 'freelancer';
		$role_freelancer->save();

		$role_employer = new Role();
		$role_employer->name = 'Employer';
		$role_employer->slug = 'employer';
		$role_employer->save();
	}
}
