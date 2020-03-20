<?php
namespace Page\Advanced;

class createPostPlus
{
    
    // extra functions
	public function generateRandomString($length = 10) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $charactersLength = strlen($characters);
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, $charactersLength - 1)];
		    }
		    return $randomString;
		}//EOF
    

    /**
     * @var \AdvancedTester
     */
    protected $AdvancedTester;

    // we inject AdvancedTester into our class
    public function __construct(\AdvancedTester $I)
    {
        $this->AdvancedTester = $I;
    }


    public function WpPostForm ()
    {
    	$I = $this->AdvancedTester;
    	
    	// Add a post
		$I->click(POST_NEW_LABEL);
		$I->see(POST_NEW_TITLE);

		// Add a title for Post
		$I->fillField('#title', 'advancedUsagePostCreationCest Test title article Cept '.generateRandomString().'');
		// Add a content for Post
		$I->fillField('#content', 'advancedUsagePostCreationCest Test content article Cept '.generateRandomString().' ');
		// Add a content for Post
		$I->fillField('#excerpt', 'advancedUsagePostCreationCest Test article excerpt Cept '.generateRandomString().' ');
		
		// select categories for Post
		// XPATH selector
		/*
		foreach (POST_CATEGORY_CHECKLIST as $locator) {
			$I->checkOption($locator);
      	}
		  */
		 
		  
		// CSS selector
		foreach (POST_CATEGORY_CHECKLIST as $locator) {
			$I->checkOption($locator);
		  }
		  
      	// Required the plugin Simple Tags for WordPress
      	// https://wordpress.org/plugins/simple-tags/
		$I->fillField('textarea[name=adv-tags-input]', POST_TAGS_LIST);
		// Publish
		$I->click('#publish');

		// Add a content for Post
		$I->click(POST_VIEW_POST_LABEL);
		
		// Post with no plugin
		$I->lookForwardTo('to have a complete Post with Tags and Categories');
		$I->see('advancedUsagePostCreationCest Test title article Cept');
		$I->see('advancedUsagePostCreationCest Test content article Cept');
	}

}// EOC
