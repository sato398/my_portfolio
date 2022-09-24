<?php

namespace Tests\Feature\Admin;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    use WithFaker, DatabaseMigrations;

    protected $adminUser;

    public function setUp() : void
    {
        parent::setUp();

        $this->artisan('admin:install');
        $this->artisan('db:seed');

        $this->adminUser = Administrator::where('username', 'admin')->first();
    }

    //dataProvider
    public function simpleGetRequestTestTargets() : array
    {
        $data = [];

        //$data[] = ['/admin'];

        //$router->resourceでルーティング生成しているものはURL構造が同じなので、ループでデータ作成
        //array[0]がPath、[1]がModel名
        foreach(
            [
                ['/admin/base-tool-categories', 'BaseToolCategory'],
                ['/admin/base-tools', 'BaseTool'],
                ['/admin/base-positions', 'BasePosition'],
                ['/admin/work-categories', 'WorkCategory'],
                ['/admin/works', 'Work'],
                ['/admin/skils', 'Skil'],
            ]
            as
            [
                $path, $model
            ]
        ){
            //結果がレコードの有無に依存するURLは、array[1]に依存しているModel名を渡す
            $data[] = [$path]; //一覧
            $data[] = [$path . '/create']; //新規作成画面
            $data[] = [$path . '/1', $model]; //詳細表示
            $data[] = [$path . '/1/edit', $model]; //既存データの編集画面
        }

        return $data;
    }

    /**
     * @param string $path
     * @param string $model
     * @dataProvider simpleGetRequestTestTargets
     */
    public function testSimpleGetRequest(string $path, ?string $model = null)
    {
        //モデルの有無でレスポンスが変わってくるURLは、レコード数をカウントしてレコードの存在をチェックする。
        //レコードが存在する場合は200、存在しなければ404を期待する
        if(!is_null($model)){
            $class = 'App\\Models\\' . $model;
            $statusCode = $class::count() > 0 ? 200 : 404;
        }else{
            $statusCode = 200;
        }

        $response = $this->actingAs($this->adminUser, 'admin')->get($path);
        $response->assertStatus($statusCode);
    }
}
