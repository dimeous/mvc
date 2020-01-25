<?php

class Model_Portfolio extends Model
{

	public function get_data()
	{

		// Здесь мы просто сэмулируем реальные данные.

		return array(

			array(
				'ID' => '1',
				'User' => 'Username1',
				'Description' => 'eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetu eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetueque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetu'
			),

			array(
				'ID' => '2',
                'User' => 'Username1',
				'Description' => 'eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetueque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetu'
			),

			array(
				'ID' => '3',
                'User' => 'Username4',
				'Description' => 'eque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetueque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetueque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetu'
			),

		);
	}

}
