<?php
/**
 * BookFixture
 *
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'category_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10, 'unsigned' => false, 'comment' => '图书分类'),
		'thumbnail' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '缩略图', 'charset' => 'utf8'),
		'wareid' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '电商图书商品ID'),
		'cid' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'comment' => '电商分类'),
		'name' => array('type' => 'string', 'null' => true, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'comment' => '名称', 'charset' => 'utf8'),
		'path' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'http_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'message' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'download_time' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '下载页面的真正时长', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'name' => array('column' => 'name', 'unique' => 1),
			'path' => array('column' => 'path', 'unique' => 1),
			'http_code' => array('column' => 'http_code', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'category_id' => 1,
			'thumbnail' => 'Lorem ipsum dolor sit amet',
			'wareid' => 1,
			'cid' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'path' => 'Lorem ipsum dolor sit amet',
			'http_code' => 1,
			'message' => 'Lorem ipsum dolor sit amet',
			'download_time' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-05-03 00:41:32',
			'modified' => '2015-05-03 00:41:32'
		),
	);

}
