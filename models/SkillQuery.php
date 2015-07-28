<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Skill]].
 *
 * @see Skill
 */
class SkillQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Skill[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Skill|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}