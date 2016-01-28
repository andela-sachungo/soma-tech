<?php

use Soma\Videos;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomepageTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    /**
     * Test the title "Categories" can be seen.
     *
     * @return void
     */
    public function testCategoriesTitleCanBeSeen()
    {
        factory(Soma\Categories::class)->create();

        $this->visit('/')
             ->see('Categories');
    }

    /**
     * Test the categories lists are clickable.
     *
     * @return void
     */
    public function testCategoriesListsCanBeClicked()
    {
        factory(Soma\Categories::class)->create([
            'title' => 'Abigail',
        ]);

        $this->seeInDatabase('categories', ['title' => 'Abigail']);

        $category_id = factory(Soma\Categories::class)->create([
            'title' => 'Osuofia',
        ])->id;

        $this->visit('/')
             ->click('Osuofia')
             ->seePageIs("categories/{$category_id}/videos");
    }

    /**
     * Test $videos and $categories variables returned to view.
     *
     * @return void
     */
    public function testVariablesReturnedToView()
    {
        factory(Soma\Categories::class, 5)->create();
        factory(Soma\Videos::class, 5)->create();

        $this->call('GET', '/');
        $this->assertViewHasAll(['videos', 'categories']);
    }

    /**
     * Test videos are paginated.
     *
     * @return void
     */
    public function testVideosPaginated()
    {
        factory(Soma\Videos::class, 24)->create();

        $results = Videos::paginate(6);

        $this->assertEquals(6, $results->perPage());
    }
}
