<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DashboardTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test the sidebar can be seen.
     *
     * @return void
     */
    public function testSidebarSeen()
    {
        $user = factory(Soma\User::class)->create();

        $this->actingAs($user)
             ->visit('/dashboard')
             ->see('Dashboard');

        $this->actingAs($user)
             ->visit('/dashboard')
             ->see('Edit Profile');

        $this->actingAs($user)
             ->visit('/dashboard')
             ->see('My videos');
    }

    /**
     * Test the user profile can be seen.
     *
     * @return void
     */
    public function testUserProfileSeen()
    {
        $user = factory(Soma\User::class)->create([
            'name' => 'Zaria Zinzi',
            'email' => 'zaria@example.com',
        ]);

        //$this->seeInDatabase('categories', ['title' => 'Abigail']);
        $this->actingAs($user)
             ->visit('/dashboard')
             ->see('Zaria Zinzi')
             ->see('zaria@example.com');
    }

    /**
     * Test the user updated data is saved in the database.
     *
     * @return void
     */
    public function testUserUpdatedDataSaved()
    {
        $user = factory(Soma\User::class)->create();

        $this->actingAs($user)
             ->visit("profile/{$user->id}/edit")
             ->type('Zulia Dexa', 'name')
             ->type('zuliadexa@example.com', 'email')
             ->press('Update')
             ->seePageIs('/dashboard');

        $this->seeInDatabase('users', ['email' => 'zuliadexa@example.com']);
    }

    /**
     * Test the user can view their own categories.
     *
     * @return void
     */
    public function testCategoriesBelongingToSelfViewed()
    {
        $user = factory(Soma\User::class)->create();
        $category = factory(Soma\Categories::class, 5)->create([
                'user_id' => $user->id,
        ]);

        $category = factory(Soma\Categories::class)->create([
                'user_id' => $user->id,
                'title' => 'Tuli',
        ]);

        $this->actingAs($user)
             ->visit('category/mycategories')
             ->see('Tuli');
    }

    /**
     * Test the user can add categories.
     *
     * @return void
     */
    public function testNewCategoriesCreated()
    {
        $user = factory(Soma\User::class)->create();
        factory(Soma\Categories::class, 3)->create([
            'user_id' => $user->id,
        ]);

        $this->actingAs($user)
             ->visit('category/mycategories')
             ->press('Add')
             ->type('Testing', 'title')
             ->press('Add')
             ->seePageIs('category/mycategories');

        $this->seeInDatabase('categories', ['title' => 'Testing']);
    }

    /**
     * Test the user can edit their own categories.
     *
     * 'edit-btn' is the id of the edit button.
     *
     * @return void
     */
    public function testCategoriesEdited()
    {
        $user = factory(Soma\User::class)->create();
        $category = factory(Soma\Categories::class)->create([
            'user_id' => $user->id,
            'title' => 'Exalted',
        ]);

        $this->seeInDatabase('categories', ['title' => 'Exalted']);

        $this->actingAs($user)
             ->visit("category/{$category->id}/edit")
             ->see('Exalted')
             ->type('God is Exalted ', 'title')
             ->press('Save')
             ->seePageIs('category/mycategories')
             ->see('God is Exalted');
    }

    /**
     * Test the user can delete their own categories.
     *
     * @return void
     */
    public function testCategoriesDeleted()
    {
        $category = factory(Soma\Categories::class)->create([
            'title' => 'Praise',
        ]);

        $this->seeInDatabase('categories', ['title' => 'Praise']);

        $this->withoutMiddleware();
        $response = $this->call('DELETE', "/category/$category->id");
        $this->assertEquals(302, $response->getStatusCode());

        $this->notSeeInDatabase('categories', ['title' => 'Praise']);
    }
}
