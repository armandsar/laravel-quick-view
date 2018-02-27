<?php

namespace Armandsar\QuickView\Tests {

    use App\Http\Controllers\Admin\SpecialTraitsController;
    use App\Http\Controllers\TraitsController;
    use Illuminate\Contracts\View\Factory as ViewFactory;
    use Orchestra\Testbench\TestCase as OrchestraTestCase;

    class TraitTest extends OrchestraTestCase
    {
        public function testHelperFunction()
        {
            $viewFactory = \Mockery::mock(ViewFactory::class);

            app()->instance(ViewFactory::class, $viewFactory);

            $viewFactory->shouldReceive('make')
                ->with('admin.special_traits.special_index', ['a' => 1], ['b' => 2])
                ->once();

            $viewFactory->shouldReceive('make')
                ->with('traits.create', [], [])
                ->once();

            (new SpecialTraitsController())->specialIndex();
            (new TraitsController())->create();
        }

    }

}

namespace App\Http\Controllers {

    use Armandsar\QuickView\Quick;

    class TraitsController
    {
        use Quick;

        public function create()
        {
            return $this->quick();
        }
    }
}

namespace App\Http\Controllers\Admin {

    class SpecialTraitsController
    {
        public function specialIndex()
        {
            return quick(['a' => 1], ['b' => 2]);
        }
    }

}