<?php

namespace backend\controllers;

use andrewdanilov\adminpanel\controllers\BackendController;
use andrewdanilov\custompages\backend\models\PageSearch;
use app\models\Type;
use backend\models\PostSearch;
use common\models\Category;
use common\models\Post;
use common\models\Tag;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends BackendController
{

    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Post();
        $selectedTags = $model->getSelectedTags();
        $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'name');

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $tags = Yii::$app->request->post('tags');
                $model->save();
                $model->saveTags($tags);
                return $this->redirect(['view', 'id' => $model->id, 'PostSearch' => ['category_id' => $model->category_id]]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $listCategories = ArrayHelper::map(Category::find()->all(), 'id', 'title');

        return $this->render('update', compact('model', 'listCategories', 'tags', 'selectedTags'));
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $selectedTags = $model->getSelectedTags();
        $tags = ArrayHelper::map(Tag::find()->all(), 'id', 'name');

        if ($this->request->isPost && $model->load($this->request->post())) {
            $tags = Yii::$app->request->post('tags');
            $model->saveTags($tags);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $listCategories = ArrayHelper::map(Category::find()->all(), 'id', 'title');
        return $this->render('update', compact('model', 'listCategories', 'tags', 'selectedTags'));
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getCategories(): array
    {
        $categories = Category::find()->all();
        $listCategories = [];
        foreach ($categories as $category) {
            $listCategories[$category->id] = $category->title;
        }

        return $listCategories;
    }

}
