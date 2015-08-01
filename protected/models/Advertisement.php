<?php

/**
 * This is the model class for table "{{advertisement}}".
 *
 * The followings are the available columns in table '{{advertisement}}':
 * @property string $id
 * @property integer $category_id
 * @property string $title
 * @property string $picture
 * @property string $created_date
 * @property integer $ordering
 */
class Advertisement extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Advertisement the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{advertisement}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, title', 'required'),
            array('category_id, ordering', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 200),
            array('picture', 'length', 'max' => 255),
            array('created_date,description', 'safe'),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_id, title, picture, created_date, ordering,description', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'category_id' => 'Category',
            'title' => 'Title',
            'picture' => 'Picture',
            'created_date' => 'Created Date',
            'ordering' => 'Ordering',
            'description' => 'Description',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('picture', $this->picture, true);
        $criteria->compare('created_date', $this->created_date, true);
        $criteria->compare('ordering', $this->ordering);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 50,
            ),
        ));
    }

    public static function getAddTitle($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{advertisement}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

    public static function getAddImage($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('picture')
                ->from('{{advertisement}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

    public static function getAddDesc($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('description')
                ->from('{{advertisement}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

}