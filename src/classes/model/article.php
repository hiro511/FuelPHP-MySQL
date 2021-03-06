<?php

class Model_Article extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'title',
		'body',
		'user_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'articles';

	protected static $_to_array_exclude = array(
  	'created_at', 'updated_at'	// 出力からこれらのカラムを除外します
  	);

}
