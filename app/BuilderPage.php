<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * App\BuilderPage
 *
 * @property int $id
 * @property string $name
 * @property string|null $html
 * @property string|null $css
 * @property string|null $js
 * @property string $theme
 * @property int $pageable_id
 * @property string $pageable_type
 * @property string|null $description
 * @property string|null $tags
 * @property string|null $title
 * @property \Illuminate\Database\Eloquent\Collection|\App\Library[] $libraries
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $pageable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereJs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereLibraries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage wherePageableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage wherePageableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BuilderPage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BuilderPage extends Eloquent {

    protected $guarded = ['id'];

   	public function pageable()
    {
        return $this->morphTo();
    }
}