<?php

namespace Armandsar\QuickView\Tests {

    use App\Http\Controllers\Admin\SpecialPostsController;
    use App\Http\Controllers\PostsController;
    use Illuminate\Contracts\View\Factory as ViewFactory;
    use Orchestra\Testbench\TestCase as OrchestraTestCase;

    class HelperTest extends OrchestraTestCase
    {
        public function testHelperFunction()
        {
            $viewFactory = \Mockery::mock(ViewFactory::class);

            app()->instance(ViewFactory::class, $viewFactory);

            $viewFactory->shouldReceive('make')
                ->with('admin.special_posts.special_index', ['a' => 1], ['b' => 2])
                ->once();

            $viewFactory->shouldReceive('make')
                ->with('posts.create', [], [])
                ->once();

            (new SpecialPostsController)->specialIndex();
            (new PostsController())->create();
        }

    }

}

namespace App\Http\Controllers {

    class PostsController
    {
        public function create()
        {
            return quick();
        }
    }
}

namespace App\Http\Controllers\Admin {

    class SpecialPostsController
    {
        public function specialIndex()
        {
            return quick(['a' => 1], ['b' => 2]);
        }
    }

}