<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Resume]].
 *
 * @see Resume
 */
class ResumeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Resume[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Resume|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}