<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\SyncTags;
use App\Traits\SaveUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DateTimeInterface;
use Carbon\Carbon;

class Post extends Model
{
    use SoftDeletes;
    use SyncTags;
    use SaveUser;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'slug',
        'alt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'user_id',
        'category_id',
        'published',
        'sponsored',
        'recommended',
        'spotlight',
        'breaking',
        'photo_source',
        'publish_time',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'publish_time'
    ];

    /**
     * Get photo associated with specified post.
     */
    /**
     * Get photo associated with specified post.
     */
    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }

    /**
     * Get category record associated with specified post.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get category record associated with specified post.
     */
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    /**
     * Get user record associated with specified post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get comments associated with specified post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('comment_id')->orderBy('created_at', 'DESC');
    }

    /**
     * Get likes associated with specified post.
     */
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    /**
     * Get tags associated with specified post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Get date in convenient for humans format.
     *
     * @return string
     */
    public function getDateAttribute()
    {
        return is_null($this->publish_time) ? '' : Carbon::parse($this->publish_time)->diffForHumans();
    }

    /**
     * Get time in specific format.
     *
     * @return string
     */
    public function getPublishDateTimeAttribute()
    {
        setlocale(LC_TIME, config('app.locale'));
        return is_null($this->publish_time) ? '' : date('F j, G:i', strtotime($this->publish_time));
    }
    

    /**
     * Add 'yes' if true and 'no' if false.
     *
     * @return string
     */
    public function getIfPublishedAttribute()
    {
        return $this->published == 0 ? 'No' : 'Yes';
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function countViewsByDays($days)
    {
        //Radnom data before Google Analytics is implemented
        $result = collect();
        $random7Days = array(11, 8, 21, 17, 6, 22, 15);
        $random30Days = array(15, 8, 19, 26, 4, 17, 19, 12, 6, 15, 18, 7, 9, 29, 17, 13, 9, 24, 18, 22, 7, 12, 21, 11, 14, 17, 27, 11, 23, 15);

        for ($i = 0; $i < $days; $i++) {

            $day = Carbon::now()->subDays($i)->toDateString();

            $dateFormat = Carbon::now()->subDays($i)->toFormattedDateString();
            $dayInWeek = Carbon::now()->subDays($i)->dayName;


            if ($days == 7) {
                $result->put($i, [
                    'name' => $dayInWeek,
                    'count' => $random7Days[$i]
                ]);
            } else {
                $result->put($i, [
                    'name' => $dateFormat,
                    'count' => $random30Days[$i]
                ]);
            }
        }

        return $result->reverse();
    }
}
