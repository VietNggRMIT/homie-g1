============NEED TO DO============
- Pages to be created: 
    + listing_application (form for users to fill and apply to a specific listing)
    + user_add_listing (form for user to add a listing)
- Functions to add:
    + Clicking on 'district' or 'city' would show a page of search results for listings at those locations
    + On home.php, searching for 'district' or 'city' would show a dropdown
    + On home.php and user_account.php, allow sorting listings based on price (ascending/descending)

=========Current directory========
- home.php: landing page
- functions.php: Functions that will be included in other files
- Pages for users to interact with -> "user_<purpose>.php"
- "verify" pages are not to be visited by user, but rather pages to process data

===============db=================
- Stores csv files to use as the database for now
- Each csv file will become a table

===========resources===============
1) document: stores documents submitted by users when uploading a listing
- Specify extensions (prevent .exe, for example)
>>>Proposal: pdf, image extensions (jpg, jpeg, gif, png), doc, docx
1.1. bill: stores recent bill from the listing
1.2. contract: stores recent contract

2) listing_image: stores images uploaded to the listing by the user
- Users can upload many images (Specify quantity later)
- The first image (found by server i.e. us) will be used as the listing's image on the homepage and user page

3) user_image: stores user profile picture (one per user)