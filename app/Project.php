<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * App\Project
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property int $published
 * @property int $public
 * @property string $framework
 * @property string $template
 * @property string $theme
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\BuilderPage[] $pages
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereFramework($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Project whereUuid($value)
 */
class Project extends Eloquent {

	protected $guarded = ['id'];

	public function pages()
    {
        return $this->morphMany(BuilderPage::class, 'pageable');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_projects', 'project_id', 'user_id');
    }
}