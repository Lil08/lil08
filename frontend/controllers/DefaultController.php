<?php
namespace frontend\controllers;

use yii\db\Expression;
use yii\web\Controller;
use andrewdanilov\custompages\frontend\Module;
use andrewdanilov\custompages\common\models\Category;
use andrewdanilov\custompages\common\models\Page;
use andrewdanilov\custompages\common\models\PageTag;
use andrewdanilov\custompages\frontend\helpers\AlbumHelper;

/**
 * Default controller
 */
class DefaultController extends Controller
{
    /**
     * @param $id
     * @return string
     */
    public function actionCategory($id)
    {
        $category = Category::find()->where(['id' => $id])->one();
        $template = Module::getInstance()->templatesPath . '/' . $category->category_template;
        return $this->render($template, [
            'category' => $category,
            'pages' => $category->pages,
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function actionPage($id)
    {
        $page = Page::find()
            ->andWhere(['id' => $id])
            ->andWhere(['<=', 'published_at', new Expression('curdate()')])
            ->one();
        if ($page->text) {
            // placing galleries instead of gallery-shortcodes
            $albums = AlbumHelper::parseShortcodes('gallery', $page->text, $page->albums);
            foreach ($albums as $album) {
                $page->text = str_replace($album['shortcode'], $this->renderPartial(Module::getInstance()->templatesPath . '/_blocks/gallery', ['album' => $album]), $page->text);
            }
            // placing sliders instead of slider-shortcodes
            $albums = AlbumHelper::parseShortcodes('slider', $page->text, $page->albums);
            foreach ($albums as $album) {
                $page->text = str_replace($album['shortcode'], $this->renderPartial(Module::getInstance()->templatesPath . '/_blocks/slider', ['album' => $album]), $page->text);
            }
        }
        if ($page->page_template) {
            $template = Module::getInstance()->templatesPath . '/' . $page->page_template;
        } elseif ($page->category_id) {
            $template = Module::getInstance()->templatesPath . '/' . $page->category->pages_template;
        } else {
            $template = Module::getInstance()->templatesPath . '/page.default.php';
        }
        return $this->render($template, [
            'page' => $page,
        ]);
    }

    /**
     * @param string $slug
     * @return string
     */
    public function actionPageTag($slug)
    {
        $pageTag = PageTag::findOne(['slug' => $slug]);
        $template = Module::getInstance()->templatesPath . '/page-tag.default.php';
        return $this->render($template, [
            'pageTag' => $pageTag,
            'pages' => $pageTag->getPages(),
        ]);
    }
}