<?php

/**
 * This is the model class for table "{{content}}".
 *
 * The followings are the available columns in table '{{content}}':
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $introtext
 * @property string $fulltext
 * @property integer $state
 * @property string $catid
 * @property string $created
 * @property string $created_by
 * @property string $modified
 * @property string $modified_by
 * @property string $publish_up
 * @property string $publish_down
 * @property integer $ordering
 * @property string $metakey
 * @property string $metadesc
 * @property string $hits
 * @property integer $featured
 * @property string $profile_picture Description
 */
class Content extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Content the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{content}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, catid, introtext, state', 'required'),
            array('state, ordering, featured', 'numerical', 'integerOnly' => true),
            array('title, alias, catid', 'length', 'max' => 255),
            array('created_by, modified_by, hits', 'length', 'max' => 10),
            array('created, modified, publish_up, publish_down', 'safe'),
            array('profile_picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, alias, introtext, fulltext, state, catid, created, created_by, modified, modified_by, publish_up, publish_down, ordering, metakey, metadesc, hits, featured, profile_picture', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
            'alias' => 'Alias',
            'introtext' => 'Introtext',
            'fulltext' => 'Fulltext',
            'state' => 'Published',
            'catid' => 'Category',
            'created' => 'Created',
            'created_by' => 'Created By',
            'modified' => 'Modified',
            'modified_by' => 'Modified By',
            'publish_up' => 'Publish Up',
            'publish_down' => 'Publish Down',
            'ordering' => 'Ordering',
            'metakey' => 'Metakey',
            'metadesc' => 'Metadesc',
            'hits' => 'Hits',
            'featured' => 'Featured',
            'profile_picture' => 'Picture',
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
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('introtext', $this->introtext, true);
        $criteria->compare('fulltext', $this->fulltext, true);
        $criteria->compare('state', $this->state);
        $criteria->compare('catid', $this->catid, true);
        $criteria->compare('created', $this->created, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('modified', $this->modified, true);
        $criteria->compare('modified_by', $this->modified_by, true);
        $criteria->compare('publish_up', $this->publish_up, true);
        $criteria->compare('publish_down', $this->publish_down, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('metakey', $this->metakey, true);
        $criteria->compare('metadesc', $this->metadesc, true);
        $criteria->compare('hits', $this->hits, true);
        $criteria->compare('featured', $this->featured);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 'created DESC, id DESC')
        ));
    }

    /**
     * Retrieves User name by ID.
     * @return string.
     */
    public function getUserName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    /**
     * Retrieves Category name by ID.
     * @return string.
     */
    public function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{content_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

    public function search_category($catid) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->alias = 't';
        $criteria->select = '*';
        $criteria->condition = 't.catid=' . $catid;
        $criteria->order = 't.created DESC';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.title', $this->title, true);
        $criteria->compare('t.alias', $this->alias, true);
        $criteria->compare('t.introtext', $this->introtext, true);
        $criteria->compare('t.fulltext', $this->fulltext, true);
        $criteria->compare('t.state', $this->state);
        $criteria->compare('t.catid', $this->catid, true);
        $criteria->compare('t.created', $this->created, true);
        $criteria->compare('t.created_by', $this->created_by, true);
        $criteria->compare('t.modified', $this->modified, true);
        $criteria->compare('t.modified_by', $this->modified_by, true);
        $criteria->compare('t.publish_up', $this->publish_up, true);
        $criteria->compare('t.publish_down', $this->publish_down, true);
        $criteria->compare('t.ordering', $this->ordering);
        $criteria->compare('t.metakey', $this->metakey, true);
        $criteria->compare('t.metadesc', $this->metadesc, true);
        $criteria->compare('t.hits', $this->hits, true);
        $criteria->compare('t.featured', $this->featured);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.created DESC')
        ));
    }

    public static function getAutoOrderingNew() {//$catid
        $maxOrdering = Yii::app()->db->createCommand()
                //->select('IFNULL(MAX(ordering),0)')
                ->select('IFNULL(MAX(id),0)')
                ->from('{{content}}')
                //->where('catid=' . (int) $catid)
                ->queryScalar();
        $maxOrdering = $maxOrdering + 1;
        return $maxOrdering;
    }

    public static function getAutoOrderingUpdate($catid, $order) {
        $total = Yii::app()->db->createCommand()
                ->select('COUNT(*)')
                ->from('{{content}}')
                ->where('catid=' . (int) $catid . ' AND ordering >=' . (int) $order)
                ->queryScalar();
        for ($i = 1; $i <= $total; $i++) {
            if (($models = Content::model()->find(array('condition' => 'catid=' . (int) $catid . ' AND ordering=' . (int) $order))) != null) {
                $models->ordering = $order + 1;
                $models->save();
            }
            $order = $order + 1;
        }
    }

    public static function get_date_time($date) {
        if (empty($date) || $date == '0000-00-00' || $date == '0000-00-00 00:00:00') {
            return null;
        } else {
            return date("M j, Y, g:i:s A", strtotime($date));
        }
    }

}
