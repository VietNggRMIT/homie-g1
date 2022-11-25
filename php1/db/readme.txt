(proposed column name)
===user.csv
username       username (unique)
user_password
user_displayname        (optional)
user_phone              user phone number (required)
user_email              (optional)
user_description (optional)

===listing.csv
listing_id
username (foreign_key)
listing_name
listing_city            
listing_district        
listing_address         
listing_price           (grand total price of the listing)
listing_description
listing_review_average

===review.csv
review_id               
review_name             (optional - suggest reviewer to leave contact info or review title)
review_description      (required)
review_rating           (required)
review_time             
listing_id (foreign_key)
