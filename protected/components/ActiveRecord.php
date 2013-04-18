<?php

/**
 * Класс для взаимодействия с БД, с функцией реализации Корзины
 * Источник: http://habrahabr.ru/blogs/yii/126576/
 *
 * @author vadim
 */
abstract class ActiveRecord extends CActiveRecord {
    const STATUS_DEFAULT = 0;
    const STATUS_REMOVED = 1;

    /**
     * Поле которое содержит дату создания записи
     * @var string
     */
    protected $_createdField = 'date_create';

    /**
     * Поле которое содержит дату редактирования записи
     * @var string
     */
    protected $_updatedField = 'date_change';

    /**
     * Поле которое содержит ссылку на создателя
     */
    protected $_creatorField = 'id_creator';

    /**
     * Поле которое содержит ссылку на редактора
     * @var string
     */
    protected $_editorField = 'id_editor';

    public function defaultScope() {
        return array(
            'condition' => 'status=' . self::STATUS_DEFAULT
        );
    }

    public function removed() {
        $this->resetScope()->getDbCriteria()->mergeWith(array(
            'condition' => 'status=' . self::STATUS_REMOVED
        ));

        return $this;
    }

    public function restore() {
        if ($this->getIsNewRecord())
            throw new CDbException(Yii::t('yii', 'The active record cannot be deleted because it is new.'));

        if ($this->status != self::STATUS_REMOVED)
            return false;

        $this->status = self::STATUS_DEFAULT;
        $this->save(false, array('status'));

        return true;
    }

    public function beforeDelete() {
        if ($this->status == self::STATUS_DEFAULT) {
            $this->status = self::STATUS_REMOVED;
            $this->save(false, array('status'));

            return false;
        }

        return parent::beforeDelete();
    }

    public function beforeSave() {
        if (!parent::beforeSave()) {
            return false;
        }

        if (isset($this->metadata->tableSchema->columns[$this->_updatedField])) {
            $this->{$this->_updatedField} = (Yii::app()->db->driverName=='sqlite'?new CDbExpression('DATETIME("now")'):new CDbExpression('NOW()'));
        }
        if (isset($this->metadata->tableSchema->columns[$this->_editorField])) {
            $this->{$this->_editorField} = Yii::app()->user->id;
        }
        if ($this->isNewRecord) {
            if (isset($this->metadata->tableSchema->columns[$this->_createdField])) {
                $this->{$this->_createdField} = (Yii::app()->db->driverName=='sqlite'?new CDbExpression('DATETIME("now")'):new CDbExpression('NOW()'));
            }
            if (isset($this->metadata->tableSchema->columns[$this->_creatorField])) {
                $this->{$this->_creatorField} = Yii::app()->user->id;
            }
            $this->status=self::STATUS_DEFAULT;
        }       
        
        return true;       
    }

    public function search() {
        $criteria = new CDbCriteria;

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}

?>
