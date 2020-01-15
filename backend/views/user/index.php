<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                'id',
                'username',
//                'auth_key',
//                'password_hash',
//                'password_reset_token',
                 'email:email',
                // 'status',
              [
                  'attribute' => 'created_at',
                  'value' => function(\common\models\User $model) {
                    return Yii::$app->formatter->asDatetime($model->created_at);
                  }
              ],
              [
                  'attribute' => 'updated_at',
                  'value' => function(\common\models\User $model) {
                    return Yii::$app->formatter->asDatetime($model->updated_at);
                  }
              ],
                // 'verification_token',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
