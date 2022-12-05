# PHP Developer Challenge

# API RestFul Endpoints

- List all users (**GET**)

    `0.0.0.0/api/products`

- Retrieve a single product (**GET**)

	`0.0.0.0/api/products/{id}`

- Create a product (**POST**)

	`0.0.0.0/api/products`

	**form-data - Body:**
	- name
	- category
	- sku
	- price

- delete a product (**DELETE**)

	`0.0.0.0/api/products/{id}`

- list all product categories (**GET**)

	`0.0.0.0/api/categories`

- Repleace a product (**PUT**)

	`0.0.0.0/api/products/{id}`

	**Body -> raw -> json:**
	{
	    "name" : "product 1",
	    "category" : 1,
	    "sku" : "ABCDEF",
	    "price" : 10.29
	}


Json file to import on Postman: http://shorturl.at/qLMRW
