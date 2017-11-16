# TalentCircles PHP Developer Kit

This library allows developers to integrate a TalentCircles network into their own application through HTTP calls to that
network's REST API endpoints.

## Setup
Setup is simple and easy with composer. See [instructions here](https://getcomposer.org/download/) if you do not have composer installed.
Once you have composer, use the following command from your project root:
```
$ composer require talentcircles/php_sdk
```

## Usage
First initialize the SDK object:
```php
// Use your Network URL, App ID, and Api Key to connect to your API.
// It is reccomended that this information be kept somewhere in your
// project that is not accessible from the public html directory.
$network_url='https://127.0.1.1';
$app_id='romeo-5931c22e4190b';
$api_key='Y1IgDgriOjAo5hKMzZ0RxC';

$tc = new TalentCirclesSDK($network_url, $app_id, $api_key);
```
Then call any of the functions below to access data on the TalentCircles network you are accessing. For example,
to get a Job object, call `getJob()` with a job id:
```php
$obj_job = $tc->getJob(6579620);
```

## Functions
### Job Functions
**getJob(INT $job_id)** - Get a single Job object for the job posting identified by $job_id
```php
$obj_job = $tc->getJob(6579620);
```

**getJobs(ARR $job_ids)** - Get multiple Job objects for the job postings identified by an array of $job_ids
```php
$job_ids = array(
    4551686,
    7480159
);
$ar_jobs = $tc->getJobs($job_ids);
```

**getJobMatchingCandidates(INT $job_id)** - Get an array of matching user objects of possible candidates for the
job posting identified by $job_id
```php
$ar_users = $tc->getJobMatchingCandidates(6579620);
```

**getSimilarJobs(INT $job_id)** - Get an array of job objects with job postings similar to the
job posting identified by $job_id
```php
$ar_users = $tc->getSimilarJobs(6579620);
```

**createJob(STR $job_title, STR $job_description, ARR $jobDetails)** - Post a new Job ad, returns the new Job object
```php
$jobTitle = "Advanced Front-end Developer";
$jobDescription = "We need somone really good at developing";

$jobDetails = array(
    'available_on' => 'November 14, 2017',
    'category_id' => 17,
    'commitment_level' => 'Full-Time',
    'apply_behavior' => 'url redirect',
    'urlRedirect' => 'https://talentcircles.com'
);

$ar_job = $tc->createJob($jobTitle, $jobDescription, $jobDetails);
```

**searchJobs(ARR $search_params, INT $page, INT $results_per_page)** - Get an array of Job objects from the database,
using SPHINX search
```php
$search_params = array(
    'tenants' => 570
);

$page = 1;
$results_per_page = 10;

$ar_jobs = $tc->searchJobs($search_params, $page, $results_per_page);
```

**updateJob(INT $job_id, ARR $update_data)** - Update an existing job posting identified by $job_id,
returns an updated Job object
```php
$job_id = 8698590;

$update_data = array(
    'available_on' => 'November 11, 2017',
    'commitment_level' => 'Part-Time',
);

$obj_job = $tc->updateJob($job_id, $update_data);
```

### User Functions
**getUser(INT $user_id)** - Get a single User object for the user profile identified by $user_id
```php
$user_id = 12770260;
$obj_user = $tc->getUser($user_id);
```

**getUsers(ARR $user_ids)** - Get an array of User objects for the profiles identified by an array of $user_ids
```php
$user_ids = array(
    12770260,
    12769405
);
$ar_users = $tc->getUsers($user_ids);
```

**getUserMatchingJobs(INT $user_id)** - Get an array of Job objects that may be suitable for the user profile
identified by $user_id
```php
$user_id = 12770260;
$ar_jobs = $tc->getUserMatchingJobs($user_id);
```

**getUserStories(INT $user_id, INT $offset, INT $limit)** - Get an array of Story objects posted by the user profile
identified by $user_id
```php
$user_id = 10961800;
$ar_stories = $tc->getUserStories($user_id);
```

**createUser(ARR $user_data)** - Create a new User profile, returns the new User object
```php
$user_data = array(
    'firstname' => 'Gerald',
    'lastname' => 'de Jager',
    'email' => 'gedj@austincity.gov',
    'zipcode' => 78704
);

$ar_user = $tc->createUser($user_data);
```

**searchUsers(ARR $search_params, INT $page, INT $results_per_page)** - Get an array of User objects from the database,
using SPHINX search
```php
$search_params = array(
    'circles' => 376
);

$page = 1;
$results_per_page = 10;

$ar_users = $tc->searchUsers($search_params, $page, $results_per_page);
```

**updateUser(INT $user_id, ARR $update_data)** - Update an existing User profile identified by $user_id,
returns an updated User object
```php
$user_id = 12770260;

$update_data = array(
    'objective' => 'To improve my career a great deal.',
);

$obj_user = $tc->updateUser($user_id, $update_data);
```

### Circle Functions
**getCircle(INT $circle_id)** - Get a single Circle object for the circle identified by $circle_id
```php
$circle_id = 375;
$obj_circle = $tc->getCircle($circle_id);
```

**getCircles(ARR $circle_ids)** - Get an array of Circle objects for circles identified by an array of $circle_ids
```php
$circle_ids = array(
    372,
    375
);
$ar_circles = $tc->getCircles($circle_ids);
```

**getCircleJobs(INT $circle_id, INT $offset, INT $limit)** - Get an array of Job objects posted to the circle
identified by $circle_id
```php
$circle_id = 375;
$result_offset = 0;
$result_limit = 10;
$ar_jobs = $tc->getCircleJobs($circle_id, $result_offset, $result_limit);
```

**getCircleMembers(INT $circle_id)** - Get an array of User objects for members of the circle identified by $circle_id
```php
$circle_id = 375;
$ar_members = $tc->getCircleMembers($circle_id);
```

**createCircle(ARR $circle_data)** - Create a new Circle, returns a Circle object
```php
$circle_data = array(
    'circle_name' => 'An Okay Test Circle',
    'owner_id' => 10961800
);
$obj_circle = $tc->createCircle($circle_data);
```

**postCircleStory(INT $circle_id, ARR $story_data)** - Post a new Story to the Circle identified by $circle_id,
returns a Circle object
```php
$circle_id = 375;
$story_details = array(
        'title' => 'A New Test Story',
        'story' => 'This story is really, really new.'
);

$obj_story = $tc->postCircleStory($circle_id, $story_details);
```

**updateCircle(INT $circle_id, ARR $update_data)** - Update an existing Circle identified by $circle_id,
returns a updated Circle object
```php
$circle_id = 384;
$update_data = array(
    'circle_name' => 'Great Test Circle',
);
$obj_circle = $tc->updateCircle($circle_id, $update_data);
```

### Story Functions
**getStory(INT $story_id)** - Get a single Story object for the story post identified by $story_id
```php
$story_id = 196;
$obj_story = $tc->getStory($story_id);
```

**getStories(ARR $story_ids)** - Get multiple Story objects for story posts identified by an array of $story_ids
```php
$story_ids = array(
    196,
    197
);
$ar_stories = $tc->getStories($story_ids);
```

**postStory(ARR $story_data)** - Post a new story to a Circle, returns the Story object
```php
$story_data = array(
    'title' => 'A new test story ' . date("U"),
    'story' => 'This test story is really new.',
    'circle_id' => $circle_id
);
$obj_story = $tc->postStory($story_data);
```

This function can also be used to post a new Story to multiple Circles by passing an array of $circle_ids
into the 'circle_id' element of the $story_data array

```php
$circle_ids = array(
    375,
    376
);
$story_data = array(
    'title' => 'Multiple Circle Test Story',
    'story' => 'This test story is being posted to two different circles.',
    'circle_id' => $circle_ids
);

$ar_stories = $tc->postStory($story_data);
```

**updateStory(INT $story_id, ARR $story_data)** - Update an existing Story post identified by $story_id,
returns the updated Story object
```php
$story_id = 240;
$story_data = array(
    'story' => 'The text of this story is being updated.',
);
$obj_story = $tc->updateStory($story_id, $story_data);
```

**updateStories(ARR $story_ids, ARR $story_data)** - Update a set of existing Stories identified by an array of $story_ids,
returns an array of the updated Story objects
```php
$story_ids = array(
    240,
    241
);
$story_data = array(
    'story' => 'The text of this story is being updated.',
);
$obj_story = $tc->updateStory($story_ids, $story_data);
```
