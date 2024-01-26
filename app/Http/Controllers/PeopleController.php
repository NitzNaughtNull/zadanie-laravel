<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    // returns all entries from people model
    private function getOne(string $id): People | null {
        return People::find($id);
    }

    public function readAll()
    {
        return People::all();
    }

    // creates new people model entry.
    public function create(Request $request)
    {
        // validates if required data is submitted and meets length requirements.
        $data = $request->validate([
            "first_name" => "required|max:16",
            "last_name" => "required|max:16",
            "phone_number" => "required|max:16",
            "street" => "required|max:32",
            "city" => "required|max:32",
            "country" => "required|max:3|min:3",
        ]);

        // creating new people entry
        $entry = new People();

        // filling fields with submitted data
        $entry->first_name = $data["first_name"];
        $entry->last_name = $data["last_name"];
        $entry->phone_number = $data["phone_number"];
        $entry->street = $data["street"];
        $entry->city = $data["city"];
        $entry->country = $data["country"];

        // saving entry to database
        $entry->save();

        // returning newly created entry
        return response($this->read($entry->id), 201);
    }

    // reads single people model entry. throws an error if "human" does not exist.
    public function read(string $id)
    {
        $entry = $this->getOne($id);

        // throwing error when noone is found
        if (is_null($entry)) {
            return response('Human not found', 400);
        }

        return $entry;
    }

    // updates already existing people model entry.
    public function update(string $id, Request $request)
    {
        // finding required human
        $people = $this->getOne($id);

        // checking if submittable data meets length requirements
        $data = $request->validate([
            "first_name" => "min:1|max:16",
            "last_name" => "min:1|max:16",
            "phone_number" => "min:1|max:16",
            "street" => "min:1|max:32",
            "city" => "min:1|max:32",
            "country" => "max:3|min:3",
        ]);

        // throwing an error when no data is submitted
        if (sizeof($data) < 1) {
            return response('No data submitted', 400);
        }

        // filling submitted data to found poeple model entry
        foreach ($data as $key => $val) {
            if (isset($people->{$key})) {
                $people->{$key} = $val;
            }
        }

        // saving changes to database;
        $people->save();

        // returning updated people model entry
        return $this->getOne($id);
    }

    // removes poeple model entry from database
    public function delete(string $id)
    {
        // finding right model entry
        $people = $this->getOne($id);

        // destroying it
        $people->delete();

        // returning response
        return response("", 204);
    }
}
