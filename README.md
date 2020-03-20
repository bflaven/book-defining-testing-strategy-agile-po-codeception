# Book #2 Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress

**Below you can find information and code about this book for sale on Amazon: [https://www.amazon.com/dp/B0864VS2Y6/](https://www.amazon.com/dp/B0864VS2Y6/)**


![Redefining a testing automation strategy for a P.O with CodeceptJS & WordPress](cover_book-defining-testing-strategy-agile-po-codeception_400x640.png)


## Foreword
It all started with a double injunction: on the one hand holding a training course in Zambia on behalf of the ZNBC and on the other hand my designation as P.O on a backoffice.


1. The Book #1 retrieves all the materials that I have brought with me for a training in Zambia on how to manage and run a news website. I made as intuitive and operational as possible. For a P.O, it is transcription of a “know-how” patiently gathered about digital project management with Agile Scrum. It has been transposed mostly to WordPress so anyone can leverage on it. It retains a maximum of good practices under usual constraints like budget, technics and team.


2. My experience in P.O forced me to take a strong interest in testing. The idea was to overcome with "agility" and in a practical way, one of the most difficult obstacles for a web application (Backoffice, Website): user acceptance testing. In comparison to this testing issue, the design and evolution of a web application seems almost easier! Indeed, how to minimize the risk of this acceptance phase, to limit it in time and to limit its "toxicity" in order to avoid regressions or side effects. In short, that each GO turns into a nightmare! Whether it is a collective responsibility change nothing! What is a P.O worth if he/she is unable to ensure that the product quality is acceptable? With a P.O (Product Owner) mindset, Book #2 & Book #3 tries concretely to answer to these questions with the help of CP (Codeception)  and CPJS (CodeceptJS).


## The continuous learning trilogy

### Book #1
**The good and small "Zambian" guide for WordPress. How to run a News Website with WordPress?**

- Github: [https://github.com/bflaven/book-small-guide-zambia-wordpress-running-news-website](https://github.com/bflaven/book-small-guide-zambia-wordpress-running-news-website)
- Amazon: [https://www.amazon.com/dp/B08645F8DZ/](https://www.amazon.com/dp/B08645F8DZ/)

### Book #2
**Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress**
- Github: [https://github.com/bflaven/book-defining-testing-strategy-agile-po-codeception](https://github.com/bflaven/book-defining-testing-strategy-agile-po-codeception)
- Amazon: [https://www.amazon.com/dp/B0864VS2Y6/](https://www.amazon.com/dp/B0864VS2Y6/)

### Book #3
**Redefining a testing automation strategy for a P.O. with CodeceptJS & WordPress**
- Github: [https://github.com/bflaven/book-redefining-testing-strategy-agile-po-codeceptjs](https://github.com/bflaven/book-redefining-testing-strategy-agile-po-codeceptjs)
- Amazon: [https://www.amazon.com/dp/B0865TT96K/](https://www.amazon.com/dp/B0865TT96K/)


## Acknowledgments

For book #2 & book #3, after a quick benchmark of the market solutions and the constraints that were mine, I totally relied on Codeception and CodeceptJS. I would like to take this opportunity to warmly thank the the Codeception (CP) and CodeceptJS (CPJS) team's excellent work and the remarkable documentation that accompanies it. Without this documentation, I believe that I would not have taken such a step.

[Codeception - https://codeception.com/](https://codeception.com/)

[CodeceptJS - https://codecept.io/](https://codecept.io/)

## Videos
Coming soon


## Book Introduction

**Ignorant I was :)**

About me, for a long time, I was ignorant about testing, suffering from a signiﬁcant deﬁcit in culture's testing. I must admit, I had negative aprioris, testing was a deceptive subject. To sum up, as a P.O, I found testing was ﬁnally disappointing and useless. I was rather fond for a signiﬁcant manual testing procedure, based on a google doc or excel sheet, and I was wrong!

The key explaining factors were the following:

1. I had difﬁculties to see correlation between testing and quality.

2. I found that tests were time-consuming, expensive with no immediate R.O.I and the manual testing was an exploring testing opportunity.

3. I found that tests were boring and also it was hard to estimate both in complexity and ﬁnancial point of view!

Again, I was all wrong and I was pretty stubborn so I needed to be convinced... by myself so here is my sole explanation and selﬁsh for this book.


## Code
**I try not to forget anything. The best thing to do is to make a fresh installation of CodeCeption (CP), finalize the configuration and then cut and paste the testing files one after the other with a WP running on custom URL in MAMP.**


``` bash
.
├── 1_Pioneer_or_Basic_Level # Chapter 1
│   ├── wordpress
│   │    ├── tests
│   │    │    ├── _data
│   │    │    ├── _output
│   │    │    ├── _support
│   │    │    ├── acceptance
│   │    │    ├── functional
│   │    │    ├── unit
│   │    │    ├── acceptance.suite.yml
│   │    │    ├── functional.suite.yml
│   │    │    └── unit.suite.yml
│   │    ├── codeception.yml  
│   │    └── composer.json
│   └── 1_Pioneer_or_Basic_Level.md # all commands used in this chapter
│
├── 2_Settler_advanced_level # Chapter 2
│   ├── wordpress
│   │    ├── tests
│   │    │    ├── _data
│   │    │    ├── _output
│   │    │    ├── _support
│   │    │    ├── acceptance
│   │    │    │     ├──BackCest.php
│   │    │    │     ├──CheckWpBackAddAJournalistProfileCest.php
│   │    │    │     ├──CheckWpBackAddPostCategoryCest.php
│   │    │    │     ├──CheckWpBackAddPostTagCest.php
│   │    │    │     ├──CheckWpBackCest.php
│   │    │    │     ├──CheckWpBackCreateAdvancedPostCest.php
│   │    │    │     ├──CheckWpBackCreateAdvancedPostPlusCest.php
│   │    │    │     ├──CheckWpBackCreatePostCest.php
│   │    │    │     ├──CheckWpBackCreateShortcodePostCest.php
│   │    │    │     ├──CheckWpBackDeletePostCategoryCest.php
│   │    │    │     ├──CheckWpBackDeletePostTagCest.php
│   │    │    │     ├──CheckWpBackNewPluginSearchAndInstallPluginsDirectoryCest.php
│   │    │    │     ├──CheckWpBackNewPluginUploadZipInstallCest.php
│   │    │    │     ├──CheckWpBackNewThemeSearchThemesDirectoryCest.php
│   │    │    │     ├──CheckWpBackNewThemeUploadZipInstallCest.php
│   │    │    │     ├──CheckWpBackNewThemeUploadZipInstallPlusCest.php
│   │    │    │     ├──CheckWpBackPluginActivationCest.php
│   │    │    │     ├──CheckWpBackPluginDeactivationCest.php
│   │    │    │     ├──CheckWpBackUploadNewMediaCest.php
│   │    │    │     ├──CheckWpFrontCest.php
│   │    │    │     ├──CheckWpFrontJournalistProfileArchiveDetailsCest.php
│   │    │    │     ├──CheckWpFrontModifyHeaderFooterCest.php
│   │    │    │     ├──CheckWpFrontTargetHomepageCest.php
│   │    │    │     ├──FrontCest.php
│   │    │    │     ├──SuperDuperCest.php
│   │    │    ├── functional
│   │    │    ├── unit
│   │    │    ├── acceptance.suite.yml
│   │    │    ├── functional.suite.yml
│   │    │    └── unit.suite.yml
│   │    ├── codeception.yml  
│   │    └── composer.json
│   └── 2_Settler_advanced_level.md # all commands used in this chapter
│
├── 3_Leader_expert_level # Chapter 3
│   ├── wordpress-codeception-distrib-4 # a distribution for CP only working with WP on MAMP
│   ├── wordpress-codeception-distrib-docker # a distribution with WP in Docker with .env & Makefile
│   └── 3_Leader_expert_level.md # all commands used in this chapter
│
│──  wp_testing_source # The WP used for the testing strategy (db, plugins...etc)
└──  README.md #This file

```

## Table of content

### I. Why is this book done?   
    1 Why Now? 
    2 Why CODECEPTION_ (CP)?   
    3 Why WordPress (WP)?  
    4 Caution  
### II. How This book Is Structured?    
    This book contains 3 big chapters  
    1 Pioneer or Basic Level   
    2 Settler or Advanced Level    
    3 Leader or Expert Level   
### III. Who is this book for?  
    Both as PO and Trainer  
    1 Technology You Need to Understand    
    2 What can you expect from the reading of this book ?  
    3 Online Content   
    4 Conventions Used in This Book    
    5 Acknowledgments  
### IV. The Importance of Testing   
    Understand the importance of testing    
#### 1. Pioneer or Basic Level   
    Quickest way to discover CP 
    1.1 Using MAMP  
    1.2 Custom address for WP in MAMP   
    1.3 Installing a WP in MAMP 
    1.4 Installing CodeCeption with the .phar file  
    HEADS-UP: CodeCeption, WP & MAMP   
    1.5 Frontoffice: Writting a first test for WP   
    1.6 Backoffice: Writting a first test for WP Admin  
    1.7 Extra explanations for Backoffice & Frontoffice.    
    1.8 Conclusion for Pioneer or Basic Level   

#### 2. Settler or Advanced Level    
    Move up to a higher level   
    2.1 Install composer on your computer   
    2.2 Naming convention for your testing strategy 
    2.3 Food for thought : how to "map" an application  
    HEADS-UP: Naming Conventions    
    2.4 Applying these principles to you testing strategy with CP   
    2.5 O.O.P for NOOBs, the Class logic revealed   
    2.6 Internalization: Languages & Tests. 
    2.7 I test, you test, we test...   
    2.8 Tests for WP Settings   
    2.9 Tests for Posts 
    2.10 Tests for Categories and Tags  
    2.11 Test for image upload  
    2.12 Test for WP plugin 
    2.13 Test for WP theme  
    2.14 Test for WP Custom Post Types and Custom Taxonomy  
    2.15 Testing the impact of a plugin on the front    
    2.16 Conclusion for Settler 

#### 3. Leader or Expert Level   
    Integrating the best practices  
    3.1 Using codeception distribution  
    3.2 Using Suite in Distribution_1 (codeception-distrib-4)   
    3.3 Using CP to make other testing: functional testing  
    3.4 Using CP to make other testing: unit testing    
    3.5 Using Gherkin and .features for acceptance testing  
    3.6 Using pageObject Model for acceptance testing   
    3.7 Using stepObject for acceptance testing 
    3.8 Using dependency injection  
    3.9 Using advanced annotation   
    3.10 Using Docker   
    3.11 How to automate your tests?    

#### 4. Conclusion   
    Conclusion  

### Resources   
    Code avalaible  

### Lexicon 
    Some Definitions    



