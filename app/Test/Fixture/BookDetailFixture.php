<?php
/**
 * BookDetailFixture
 *
 */
class BookDetailFixture extends CakeTestFixture {

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
		'price' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => false, 'comment' => '价格'),
		'pressid' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '出版社', 'charset' => 'utf8'),
		'author_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '著者'),
		'translator' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '译者', 'charset' => 'utf8'),
		'drawing' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '绘者', 'charset' => 'utf8'),
		'isbn' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ISBN', 'charset' => 'utf8'),
		'revision' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '版次', 'charset' => 'utf8'),
		'path' => array('type' => 'string', 'null' => true, 'default' => null, 'key' => 'unique', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'packing' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '包装', 'charset' => 'utf8'),
		'folio' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '开本', 'charset' => 'utf8'),
		'publication_time' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => '出版时间'),
		'printing_time' => array('type' => 'date', 'null' => true, 'default' => null, 'comment' => '印刷时间'),
		'paper' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '用纸', 'charset' => 'utf8'),
		'pages' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 255, 'unsigned' => false, 'comment' => '页数'),
		'impression' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '印次', 'charset' => 'utf8'),
		'number_suits' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '套装数量'),
		'number_words' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => '字数'),
		'body_language' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '正文语种', 'charset' => 'utf8'),
		'editor' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '编辑推荐', 'charset' => 'utf8'),
		'brief_introduction' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '内容简介', 'charset' => 'utf8'),
		'wonderful_review' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '精彩书评', 'charset' => 'utf8'),
		'catalog' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '目录', 'charset' => 'utf8'),
		'digest' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '精彩书摘', 'charset' => 'utf8'),
		'foreword_preface' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '前言/序言', 'charset' => 'utf8'),
		'http_code' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'index'),
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
			'price' => '',
			'pressid' => 'Lorem ipsum dolor sit amet',
			'author_id' => '',
			'translator' => 'Lorem ipsum dolor sit amet',
			'drawing' => 'Lorem ipsum dolor sit amet',
			'isbn' => 'Lorem ipsum dolor sit amet',
			'revision' => 'Lorem ipsum dolor sit amet',
			'path' => 'Lorem ipsum dolor sit amet',
			'packing' => 'Lorem ipsum dolor sit amet',
			'folio' => 'Lorem ipsum dolor sit amet',
			'publication_time' => '2015-05-16',
			'printing_time' => '2015-05-16',
			'paper' => 'Lorem ipsum dolor sit amet',
			'pages' => 1,
			'impression' => 'Lorem ipsum dolor sit amet',
			'number_suits' => 1,
			'number_words' => 1,
			'body_language' => 'Lorem ipsum dolor sit amet',
			'editor' => 'Lorem ipsum dolor sit amet',
			'brief_introduction' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'wonderful_review' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'catalog' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'digest' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'foreword_preface' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'http_code' => 1,
			'download_time' => 'Lorem ipsum dolor sit amet',
			'created' => '2015-05-16 20:35:34',
			'modified' => '2015-05-16 20:35:34'
		),
	);

}
