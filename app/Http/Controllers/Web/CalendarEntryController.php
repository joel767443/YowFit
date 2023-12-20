<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCalendarEntryRequest;
use App\Http\Requests\UpdateCalendarEntryRequest;
use App\Models\CalendarEntry;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 *
 */
class CalendarEntryController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $calendarEntries = CalendarEntry::all();
        return response()->json($calendarEntries, Response::HTTP_OK);
    }

    /**
     * @param CreateCalendarEntryRequest $request
     * @return JsonResponse
     */
    public function store(CreateCalendarEntryRequest $request): JsonResponse
    {
        $calendarEntry = CalendarEntry::create($request->validated());
        return response()->json($calendarEntry, Response::HTTP_CREATED);
    }

    /**
     * @param CalendarEntry $calendarEntry
     * @return JsonResponse
     */
    public function show(CalendarEntry $calendarEntry): JsonResponse
    {
        return response()->json($calendarEntry, Response::HTTP_OK);
    }

    /**
     * @param UpdateCalendarEntryRequest $request
     * @param CalendarEntry $calendarEntry
     * @return JsonResponse
     */
    public function update(UpdateCalendarEntryRequest $request, CalendarEntry $calendarEntry): JsonResponse
    {
        $calendarEntry->update($request->validated());
        return response()->json($calendarEntry, Response::HTTP_OK);
    }

    /**
     * @param CalendarEntry $calendarEntry
     * @return JsonResponse
     */
    public function destroy(CalendarEntry $calendarEntry): JsonResponse
    {
        $calendarEntry->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
