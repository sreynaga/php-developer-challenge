# PHP Developer Challenge

#### API RestFul Endpoints

- List all users (**GET**)

    `0.0.0.0/api/products`

- Retrieve a single product (**GET**)

	`0.0.0.0/api/products/{id}`

- Create a product (**POST**)

	`0.0.0.0/api/products`

	**Body -> form-data:**
	- name
	- category
	- sku
	- price

- Delete a product (**DELETE**)

	`0.0.0.0/api/products/{id}`

- List all product categories (**GET**)

	`0.0.0.0/api/categories`

- Repleace a product (**PUT**)

	`0.0.0.0/api/products/{id}`

	**Body -> raw -> json:**
	
	<code>
		{
		    "name" : "product 1",
		    "category" : 1,
		    "sku" : "ABCDEF",
		    "price" : 10.29
		}
	</code>


Json file to import on Postman: http://shorturl.at/qLMRW
