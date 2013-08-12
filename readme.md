Laravel-Architecture
====================

Experimenting with code Architecture in Laravel

## To Do
1. Add cache to repo
2. [??] Extend collection for own Paginator and create or steal paginator interface. (Compose Laravel Paginator into extended class to do logic). Ability to set page manually, take Input class out of it.
3. Use Carbon over DateTime for time fields? (Add as core dependency?)

## Like:
1. Has Entities over relying on Orm
2. Validation simpler
3. Form with Validation and Repo *might* be simpler than previous attempts

## Dislike:
1. Should I really care about not using ORM for business logic?
2. Entering Entity into validator assumes Forms have exact fields as entity?

## Issues:
1. Collection always returned if empty?
2. Single article retrieval returns NULL, but currently expects Eloquent Model even if no result
    * Attempt to throw and catch Exception to trigger 404?
    * Or add code to handle "NULL" responses?
    * Or change Model code to never return NULL?
3. Business domain code depends on `Illuminate\Support` and `Illuminate\Validation` in the core business logic.
4. Eloquent factory has interface with `create`, but that method is only used internally! in `EloquentEntityFactory`. Unless you count `EloquentEntityFactory` as the "user", which it isn't - it implements the `FactoryInterface` instead of composing an implementat of `FactoryInterface`.
    * Entity Factories un-used - instead, `EloquentEntityFactory` attempts to handle all conversion of model to entity. This feels hella wrong, as per SOLID. I should use specific implementations instead (At least this makes more sense!)

Overall, having issues in either NOT using Laravel *at all* for business logic (except for Interface implementations), versus going "all in" with Laravel (accepting Laravel libraries as core dependencies), or even finding a happy medium.

Should I decide that the ORM is both data and domain entity and abstract Validation/Forms around that fact? (Feels like "giving up", but the code is much simpler).