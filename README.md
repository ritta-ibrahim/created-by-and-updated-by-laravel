# created-by-and-updated-by-laravel
A simple trait to add to models that auto fill "created_by" and "updated_by" values.

## Usage
1. Add the **BlamableTrait.php** file to the "App\Traits" directory.
2. Add the columns to the table:
```
$table->unsignedBigInteger('created_by')->nullable();
$table->unsignedBigInteger('updated_by')->nullable();
```

3. Use the trait in the model:
```
use App\Traits\BlamableTrait;

class Category extends Model
{
    use HasFactory, BlamableTrait;
}
```

Now whenever you save a new record without manually filling created_by and updated_by, the trait will automatically fill the fields with current auth user id, or just leave it null if no user logged in. And whenever you update a record the trait will fill only the updated_by column.
