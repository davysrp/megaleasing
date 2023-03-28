<?php

namespace App\Repositories\Backend\Client;

use DB;
use Carbon\Carbon;
use App\Models\Client\Client;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientRepository.
 */
class ClientRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Client::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.clients.table').'.id',
                config('module.clients.table').'.name',
                config('module.clients.table').'.photo',
                config('module.clients.table').'.created_at',
                config('module.clients.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Client::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.clients.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Client $client
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Client $client, array $input)
    {
    	if ($client->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.clients.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Client $client
     * @throws GeneralException
     * @return bool
     */
    public function delete(Client $client)
    {
        if ($client->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.clients.delete_error'));
    }
}
