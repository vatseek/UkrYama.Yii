<?php

/**
 * This is the model class for table "{{gibdd_heads}}".
 *
 * The followings are the available columns in table '{{gibdd_heads}}':
 * @property integer $id
 * @property string $name
 * @property integer $subject_id
 * @property string $post
 * @property string $post_dative
 * @property string $fio
 * @property string $fio_dative
 * @property string $gibdd_name
 * @property string $contacts
 * @property string $address
 * @property string $tel_degurn
 * @property string $tel_dover
 * @property string $url
 */
class GibddHeadsBuffer extends CActiveRecord
{
	public $post='Начальник';
	public $str_subject;
	public $mindist;
	
	public $levelNames=Array(
		0=>'ГУОБДД РФ',
		1=>'ГИБДД региона',
		2=>'ГИБДД района',
		3=>'спецбатальон на спецтрассе',
	);
	/**
	 * Returns the static model of the specified AR class.
	 * @return GibddHeads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{gibdd_heads_buffer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, subject_id, post, post_dative, fio, fio_dative, gibdd_name, address, level', 'required'),
			array('subject_id, is_regional, moderated, level', 'numerical', 'integerOnly'=>true),
			array('post, post_dative, fio, fio_dative, gibdd_name, tel_degurn, tel_dover, url', 'length', 'max'=>255),
			array('contacts, str_subject', 'length'),
			array('lat, lng', 'numerical'),
			array('url, url_priemnaya', 'url','allowEmpty'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, subject_id, post, post_dative, fio, fio_dative, gibdd_name, contacts, address, tel_degurn, tel_dover, url, lat, lng, is_regional, moderated', 'safe', 'on'=>'search'),
		);
	}
	
	public function getLink()
	{
		if ($this->url) {
			$parseurl=parse_url($this->url);
			if (isset($parseurl['host'])) return CHtml::link($parseurl['host'], $this->url, Array('target'=>"_BLANK"));			
			}
		else return '';	
	}
	
	public function getUserlevelNames()
	{
		if ($this->is_regional) return $this->levelNames;
		$arr=Array();
		foreach ($this->levelNames as $i=>$level)
			if ($i>1) $arr[$i]=$level;
		return $arr;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'subject'=>array(self::BELONGS_TO, 'RfSubjects', 'subject_id'),
		'holes'=>array(self::HAS_MANY, 'Holes', 'gibdd_id'),
		'areas'=>array(self::HAS_MANY, 'GibddAreas', 'gibdd_id'),
		);
	}	
		
		
	
	/**	
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название сокращенно',
			'subject_id' => 'Subject',
			'post' => 'Должность начальника',
			'post_dative' => 'Пост и название подразделения в дательном падеже',
			'fio' => 'ФИО начальника',
			'fio_dative' => 'ФИО начальника в дательном падеже',
			'gibdd_name' => 'Название подразделения',
			'contacts' => 'Contacts',
			'address' => 'Адрес',
			'tel_degurn' => 'Тел. дежурной части',
			'tel_dover' => 'Тел. доверия',
			'url' => 'Сайт',
			'lat' => 'Широта',
			'lng' => 'Долгота',
			'url_priemnaya'=>'Интернет-приемная',
			'level'=>'Уровень ГИБДД',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('post_dative',$this->post_dative,true);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('fio_dative',$this->fio_dative,true);
		$criteria->compare('gibdd_name',$this->gibdd_name,true);
		$criteria->compare('contacts',$this->contacts,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel_degurn',$this->tel_degurn,true);
		$criteria->compare('tel_dover',$this->tel_dover,true);
		$criteria->compare('url',$this->url,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}