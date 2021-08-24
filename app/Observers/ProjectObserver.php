<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Contact;
use App\Mail\ProjectChanged;
use Illuminate\Support\Facades\Mail;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        //
    }

    /**
     * Handle the Project "updated" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        $contents = '';
        if($project->isDirty('title')){
            $contents = $contents . 'Az új cím: ' . $project->title;
        }
        if($project->isDirty('description')){
            $contents = $contents . ' Az új leírás: ' . $project->description;
        }
        if($project->isDirty('status')){
            $contents = $contents . ' Az új státusz: ' . $project->status;
        } 

        if($contents != ''){
            $contacts = Contact::where('project_id', $project->id)->get();
            $subject = $project->title . ' projekt adatai megváltoztak';
            
            foreach($contacts as $contactId) {
                $this->sendEmailToContact($contactId, $contents, $subject);
            }
        }
    }

    private function sendEmailToContact($contactId, $contents, $subject)
    {
        $contact = Contact::find($contactId);

        Mail::to($contact)->send(new ProjectChanged($contents, $subject));
    }

    /**
     * Handle the Project "deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function deleted(Project $project)
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function restored(Project $project)
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function forceDeleted(Project $project)
    {
        //
    }
}
