<?php

namespace App\Http\Controllers;

use App\Models\Table_Customer;
use App\Models\Table_Food_Product;
use App\Models\Table_Delivery;
use App\Models\Table_Food_Supply;
use App\Models\Table_Order_Details;
use App\Models\Table_Transaction_Reports;
//use App\Models\Table_Delivery;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    //this is the function for the customer
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required|max:255',
                'contact_number' => 'required|numeric',
                'address' => 'required',
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $input_data = [
            // it is an array that contains the customer details
            'id' => $request->id,
            'name' => $request->name,
            'contact_number' => $request->contact_number,
            'address' => $request->address
        ];

        Table_Customer::create($input_data);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ]; // this is an array that tells the records inserted successfull

        return response()->json($data);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'contact_number' => 'required|numeric',
                'address' => 'required'
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        //assigment oprator starts from right to left of the equal to sign =

        $id = $request->id;
        // objects have methods and variables
//the request objects comes from postman

        $table_customer = Table_Customer::find($id);

        $table_customer->id = $request->id; // it is getting it through the variable postman
        $table_customer->name = $request->name; // it is the postman that send the request
        $table_customer->contact_number = $request->contact_number;
        $table_customer->address = $request->address;

        $table_customer->save();
        echo "Table_Customer updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"

        ];
        return $data;


    }

    public function get(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_customer = Table_Customer::find($id);

        //return response()->json($book);
        return response()->json($table_customer);
    }


    public function getAll(Request $request)
    {

        $table_customer = Table_Customer::all();

        return response()->json($table_customer);
    }

    public function delete(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $tabale_customer = Table_Customer::find($id);

        $tabale_customer->delete();
        //return response()->json($book);
        return response()->json($tabale_customer); //it converts it to json format

    }

    // this functions and methods for the Delivery
    public function create_Delivery(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'quantity' => 'required|numeric',
                'payment' => 'required',
                'date' => 'required|date'

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $table_delivery = Table_Delivery::create([
            'id' => $request->id,
            'customer_id' => $request->customer_id,
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'payment' => $request->payment,
            'date' => $request->date,
        ]);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ];

        return response()->json($data);
    }

    public function update_Delivery(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'quantity' => 'required',
                'payment' => 'required',
                'date' => 'required|date'
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $id = $request->id; // objects have methods and variables

        $table_delivery = Table_Delivery::find($id);

        $table_delivery->id = $request->id;
        $table_delivery->customer_id = $request->customer_id;
        $table_delivery->food_id = $request->food_id;
        $table_delivery->quantity = $request->quantity;
        $table_delivery->payment = $request->payment;
        $table_delivery->date = $request->date;

        $table_delivery->save();
        echo "Table_Customer updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"

        ];
        return $data;


    }

    public function get_table_delivery(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_delivery = Table_Delivery::find($id);

        //return response()->json($book);
        return response()->json($table_delivery);
    }


    public function get_all(Request $request)
    {
        $table_delivery = Table_Delivery::all();

        return response()->json($table_delivery);


    }

    public function delete_delivery(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $tabale_delivery = Table_Delivery::find($id);

        $tabale_delivery->delete();
        //return response()->json($book);
        return response()->json($tabale_delivery); //it converts it to json format



    }
    //this is the function for the food product
    public function create_food_product(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $table_food_product = Table_Food_Product::create([
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ];

        return response()->json($data);
    }

    public function update_food_product(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'description' => 'required',
                'price' => 'required|numeric'
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $id = $request->id; // objects have methods and variables

        $table_food_product = Table_Food_Product::find($id);

        $table_food_product->id = $request->id;
        $table_food_product->name = $request->name;
        $table_food_product->description = $request->description;
        $table_food_product->price = $request->price;

        $table_food_product->save();
        echo " updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"
        ];
        return $data;
    }

    public function get_food_product(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_food_product = Table_Food_Product::find($id);

        //return response()->json($book);
        return response()->json($table_food_product);
    }

    public function getAll_food_product(Request $request)
    {
        $table_food_product = Table_Food_Product::all();

        return response()->json($table_food_product);

    }

    public function delete_food_product(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_food_product = Table_Food_Product::find($id);

        $table_food_product->delete();
        //return response()->json($book);
        return response()->json($table_food_product);
    }

    //this the function for food supply
    public function create_food_supply(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'quantity' => 'required|numeric',
                'date' => 'required',
                'amount' => 'required|numeric'

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $table_food_supply = Table_Food_Supply::create([
            'id' => $request->id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'date' => $request->date,
            'amount' => $request->amount,
        ]);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ];

        return response()->json($data);
    }

    public function update_food_supply(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'name' => 'required',
                'quantity' => 'required',
                'date' => 'required|date',
                'amount' => 'required|numeric'
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $id = $request->id; // objects have methods and variables

        $table_food_supply = table_food_supply::find($id);

        $table_food_supply->id = $request->id;
        $table_food_supply->name = $request->name;
        $table_food_supply->quantity = $request->quantity;
        $table_food_supply->date = $request->date;
        $table_food_supply->amount = $request->amount;

        $table_food_supply->save();
        echo " updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"
        ];
        return $data;
    }

    public function get_food_supply(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_food_supply = Table_Food_Supply::find($id);

        //return response()->json($book);
        return response()->json($table_food_supply);
    }

    public function getAll_food_supply()
    {
        $table_food_supply = Table_Food_Supply::all();

        return response()->json($table_food_supply);

    }

    public function delete_food_supply(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_food_supply = Table_Food_Supply::find($id);

        $table_food_supply->delete();
        //return response()->json($book);
        return response()->json($table_food_supply);
    }

    public function create_order_details(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'quantity' => 'required|numeric',
                'delivery_id' => 'required|numeric',
                'date' => 'required|date'

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $table_order_details = Table_Order_Details::create([
            'id' => $request->id,
            'customer_id' => $request->customer_id,
            'food_id' => $request->food_id,
            'quantity' => $request->quantity,
            'delivery_id' => $request->delivery_id,
            'date' => $request->date,
        ]);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ];

        return response()->json($data);
    }

    public function update_order_details(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'quantity' => 'required|numeric',
                'delivery_id' => 'required|numeric',
                'date' => 'required|date'
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }

        $id = $request->id; // objects have methods and variables

        $table_order_details = Table_Order_Details::find($id);

        $table_order_details->id = $request->id;
        $table_order_details->customer_id = $request->customer_id;
        $table_order_details->food_id = $request->food_id;
        $table_order_details->quantity = $request->quantity;
        $table_order_details->delivery_id = $request->delivery_id;
        $table_order_details->date = $request->date;

        $table_order_details->save();
        echo " updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"
        ];
        return $data;
    }

    public function get_order_details(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_order_details = Table_Order_Details::find($id);

        //return response()->json($book);
        return response()->json($table_order_details);
    }

    public function getAll_order_details(Request $request)
    {

        $table_order_details = Table_Order_Details::all();

        return response()->json($table_order_details);
    }

    public function delete_order_details(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_order_details = Table_Order_Details::find($id);

        $table_order_details->delete();
        //return response()->json($book);
        return response()->json($table_order_details);
    }

    public function create_transaction_reports(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'order_id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'supply_id' => 'required|numeric',
                'delivery_id' => 'required|numeric',
                'date' => 'required|date',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $table_transaction_reports = Table_Transaction_Reports::create([
            'id' => $request->id,
            'order_id' => $request->order_id,
            'customer_id' => $request->customer_id,
            'food_id' => $request->food_id,
            'supply_id' => $request->supply_id,
            'delivery_id' => $request->delivery_id,
            'date' => $request->date,
        ]);

        $data = [
            "status" => true,
            "message" => "record inserted successfully"
        ];

        return response()->json($data);
    }

    public function update_transaction_reports(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
                'order_id' => 'required|numeric',
                'customer_id' => 'required|numeric',
                'food_id' => 'required|numeric',
                'supply_id' => 'required|numeric',
                'delivery_id' => 'required|numeric',
                'date' => 'required|date',
            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_transaction_reports = Table_Transaction_Reports::find($id);

        $table_transaction_reports->id = $request->id;
        $table_transaction_reports->order_id = $request->order_id;
        $table_transaction_reports->customer_id = $request->customer_id;
        $table_transaction_reports->food_id = $request->food_id;
        $table_transaction_reports->supply_id = $request->supply_id;
        $table_transaction_reports->delivery_id = $request->delivery_id;
        $table_transaction_reports->date = $request->date;

        $table_transaction_reports->save();
        echo " updated successfully";

        $data = [
            "status" => true,
            "message" => "record updated successfully"
        ];
        return $data;

    }

    public function get_transaction_reports(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',

            ]

        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_transaction_reports = Table_Transaction_Reports::find($id);

        //return response()->json($book);
        return response()->json($table_transaction_reports);
    }

    public function getAll_transaction_reports(Request $request)
    {

        $table_transaction_reports = Table_Transaction_Reports::all();
        return response()->json($table_transaction_reports);
    }

    public function delete_transaction_reports(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $id = $request->id; // objects have methods and variables

        $table_tansaction_reports = Table_Transaction_Reports::find($id);

        $table_tansaction_reports->delete();
        //return response()->json($book);
        return response()->json($table_tansaction_reports);
    }
}


//others ways or methods
// $Table_customer = Table_Customer::create([
//     'id' => $request->id,
//     'name' => $request->name,
//     'contact_number' => $request->contact_number,
//     'address' => $request->address
// ]);

// $data = [
//     "status" => true,
//     "message" => "record inserted successfully"
// ];

//return response()->json($data)
