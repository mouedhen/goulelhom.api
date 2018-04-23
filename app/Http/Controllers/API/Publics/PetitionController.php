<?php

namespace App\Http\Controllers\API\Publics;

use App\Http\Resources\Publics\PetitionResource;
use App\Models\Contacts\Organization;
use App\Models\Contacts\OrganizationTranslation;
use App\Models\Petitions\Petition;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Webpatser\Uuid\Uuid;

class PetitionController extends Controller
{
    public function index()
    {
        return PetitionResource::collection(
            Petition::all()
        );
    }

    // User::firstOrCreate(['email' => $email], ['name' => $name]);
    // User's existence will be only checked via email, but when created, the new record will save both email and name.

    public function store(Request $request)
    {
        // return response()->json(App::getLocale());
        // $organization = Organization::firstOrCreate(['name' => $request->get('organisation')]);
        $checkOrganization = OrganizationTranslation::where('name', '=',$request->get('organization'))
            ->first();
        $organization = new Organization();

        if ($checkOrganization === null) {
            $organization->fill([
                App::getLocale() => ['name' => $request->get('organization')],
            ]);
            $organization->save();
        } else {
            $organization = Organization::findOrFail($checkOrganization->organization_id);
        }
        // return response()->json($organization);

        $record = new Petition();

        $params = $request->only(['end_date', 'name', 'description', 'theme_id', 'contact_id', 'requested_signatures_number']);
        $params['organization_id'] = $organization->id;
        $params['uuid'] = (string) Uuid::generate();
        $params['start_date'] = new Carbon();
        $params['end_date'] = new Carbon($params['end_date']);

        $record->fill($params);

        $record->save();

        $data = [
            'message' => 'record created successfully',
            'code' => JsonResponse::HTTP_CREATED,
            'data' => new PetitionResource($record),
        ];

        return response()->json($data, JsonResponse::HTTP_CREATED);
    }
}
