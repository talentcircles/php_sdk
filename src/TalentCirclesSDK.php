<?php
/**
 * TalentCirclesSDK.php
 *
 * A developer library for accessing TalentCircles network APIs
 *
 * @author tom@talentcircles.com
 * @copyright Copyrights (c) 2017, TalentCircles, Inc.
 */

/* Require Configuration File */
require_once('TalentCirclesSDKConf.php');

class TalentCircles {
    const JOB_RESOURCE = "jobs";
    const USER_RESOURCE = "users";
    const CIRCLE_RESOURCE = "circles";
    const STORY_RESOURCE = "stories";

    const MATCHING_JOBS_POSESSION = 'matching_jobs';
    const SIMILAR_CANDIDATES_POSESSION = 'similar_candidates';
    const STORIES_POSESSION = 'stories';
    const CANDIDATES_POSESSION = 'candidates';
    const SIMILAR_JOBS_POSESSION = 'similar_jobs';
    const USERS_POSESSION = 'users';
    const JOBS_POSESSION = 'jobs';

    public function init($method = "GET", $resource, $resource_id = null, $posession = null, $posession_id = null, $additional_params = null) {
        $app_id = TalentCirclesSDKConf::APP_ID;
        $api_key = TalentCirclesSDKConf::API_KEY;;
        $curl = curl_init();

        $uri = "/api/v1/" . $resource;
        if ($resource_id) {
            $uri .= "/" . $resource_id;
        }
        if ($posession) {
            $uri .= "/" . $posession;
        }
        if ($posession_id) {
            $uri .= "/" . $posession_id;
        }

        if ($additional_params && is_array($additional_params) && count($additional_params) > 0) {
            $uri .= "?";

            foreach ($additional_params as $param => $value) {
                $uri .= '&' . $param . '=' . $value;
            }
        }

        $url = TalentCirclesSDKConf::NETWORK_URL . $uri;
//        $url = "https://mytalentmall.talentcircles.vm" . $uri;

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => false,
            CURLOPT_VERBOSE        => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,    // for https
            CURLOPT_USERPWD  => $app_id . ":" . $api_key,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_CUSTOMREQUEST => $method,
        ));

        if ($method == "POST") {
            curl_setopt($curl, CURLOPT_POST, true);
        }

        return $curl;
    }

    public function initSearch($resource, $search_params = null, $page = 1, $results_per_page = 10) {
        $app_id = TalentCirclesSDKConf::APP_ID;
        $api_key = TalentCirclesSDKConf::API_KEY;;
        $curl = curl_init();

        $search_string = 'page=' . $page . '&' . 'results_per_page=' . $results_per_page;
        if ($search_params && is_array($search_params)) {
            foreach ($search_params as $param => $value) {
                $search_string .= '&' . $param . '=' . $value;
            }
        }

        $uri = "/api/v1/" . $resource . "?" . $search_string;

        $url = TalentCirclesSDKConf::NETWORK_URL . $uri;

        curl_setopt_array($curl, array(
            CURLOPT_URL            => $url,
            CURLOPT_HEADER         => false,
            CURLOPT_VERBOSE        => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYPEER => false,    // for https
            CURLOPT_USERPWD  => $app_id . ":" . $api_key,
            CURLOPT_HTTPAUTH => CURLAUTH_DIGEST,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        return $curl;
    }

    public function getResource($resource, $resource_id) {
        if (is_array($resource_id)) {
            $resource_id = implode(',', $resource_id);
        }
        $connection = $this->init("GET", $resource, $resource_id);

        $response = curl_exec($connection);

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function getPosessions($resource, $resource_id, $posession, $additional_params = array()) {
        $connection = $this->init("GET", $resource, $resource_id, $posession, null, $additional_params);

        $response = curl_exec($connection);

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function createResource($resource, $post_data = array(), $defaultDetails = array()) {

        $connection = $this->init("POST", $resource);

        $createData = array_merge($defaultDetails, $post_data);

        curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($createData));

        $response = curl_exec($connection);

        if (strpos($response, '\<font') !== false) {
            $responseElements = explode('\<\/font\>', $response);
            $response = array_pop($responseElements);
        }

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function createPosession($resource, $resource_id, $posession, $post_data = array(), $defaultDetails = array()) {

        $connection = $this->init("POST", $resource, $resource_id, $posession);

        $createData = array_merge($defaultDetails, $post_data);

        curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($createData));

        $response = curl_exec($connection);

        if (strpos($response, '\<font') !== false) {
            $responseElements = explode('\<\/font\>', $response);
            $response = array_pop($responseElements);
        }

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function searchResource($resource, $search_params, $page = 1, $results_per_page = 10) {
        $connection = $this->initSearch($resource, $search_params, $page, $results_per_page);

        $response = curl_exec($connection);

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function updateResource($resource, $resource_id, $update_data) {
        if (is_array($resource_id)) {
            $resource_id = implode(',', $resource_id);
        }

        $connection = $this->init("PUT", $resource, $resource_id);

        curl_setopt($connection, CURLOPT_POSTFIELDS, http_build_query($update_data));

        $response = curl_exec($connection);

        if (strpos($response, '\<font') !== false) {
            $responseElements = explode('\<\/font\>', $response);
            $response = array_pop($responseElements);
        }

        $err = curl_error($connection);

        curl_close($connection);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return json_decode($response);
        }
    }

    public function validateResource($resource_data, $required_fields) {
        foreach ($required_fields as $field) {
            if (!isset($resource_data[$field]) || $resource_data[$field] == null || $resource_data[$field] == '') {
                throw new Exception("Missing required field: " . $field);
            }
        }
        return $resource_data;
    }

    /** JOBS */
    public function getJob($job_id) {
        $result = $this->getResource(self::JOB_RESOURCE, $job_id);
        if ($result) {
            return $result->job;
        }
        return null;
    }

    public function getJobs($job_ids) {
        $result = $this->getResource(self::JOB_RESOURCE, $job_ids);
        if ($result && $result->jobs) {
            return $result->jobs;
        }
        return null;
    }

    public function getJobMatchingCandidates($job_id) {
        $result = $this->getPosessions(self::JOB_RESOURCE, $job_id, self::CANDIDATES_POSESSION);
        if ($result) {
            return $result->candidates;
        }
        return null;
    }

    public function getSimilarJobs($job_id) {
        $result = $this->getPosessions(self::JOB_RESOURCE, $job_id, self::SIMILAR_JOBS_POSESSION);
        return $result->jobs;
    }

    public function createJob($job_title, $job_description, $jobDetails = array()) {
        $defaultDetails = array(
            'available_on' => date('F j, Y'),
            'category_id' => 0,
            'commitment_level' => 'Full-Time',
            'apply_behavior' => 'url redirect',
            'urlRedirect' => 'https://talentcircles.com'
        );

        $jobDetails['job_title'] = $job_title;
        $jobDetails['description'] = $job_description;

        $result = $this->createResource(self::JOB_RESOURCE, $jobDetails, $defaultDetails);
        return $result->job;
    }

    public function searchJobs($search_params, $page = 1, $results_per_page = 10) {
        $result = $this->searchResource(self::JOB_RESOURCE, $search_params, $page, $results_per_page);
        return $result->jobs;
    }

    public function updateJob($job_id, $update_data) {
        $result = $this->updateResource(self::JOB_RESOURCE, $job_id, $update_data);
        return $result->job;
    }

    /** USERS */
    public function getUserMatchingJobs($user_id) {
        $result = $this->getPosessions(self::USER_RESOURCE, $user_id, self::MATCHING_JOBS_POSESSION);
        return $result->jobs;
    }

    public function getUser($user_id) {
        $result = $this->getResource(self::USER_RESOURCE, $user_id);
        return $result->user;
    }

    public function getUsers($user_ids) {
        $result = $this->getResource(self::USER_RESOURCE, $user_ids);
        return $result->users;
    }

    public function getUserStories($user_id, $offset = 0, $limit = 10) {
        $params = array(
            'offset' => $offset,
            'limit' => $limit
        );
        $result = $this->getPosessions(self::USER_RESOURCE, $user_id, self::STORIES_POSESSION, $params);
        return $result->stories;
    }

    public function getSimilarUsers($user_id) {
        $result = $this->getPosessions(self::USER_RESOURCE, $user_id, self::SIMILAR_CANDIDATES_POSESSION);
        return $result->users;
    }

    public function createUser($user_data) {
        $valid_data = $this->validateUser($user_data);
        $result = $this->createResource(self::USER_RESOURCE, $valid_data);
        return $result->user;
    }

    public function searchUsers($search_params, $page = 1, $results_per_page = 10) {
        $result = $this->searchResource(self::USER_RESOURCE, $search_params, $page, $results_per_page);
        return $result->users;
    }

    public function updateUser($user_id, $update_data) {
        $obj_user = $this->updateResource(self::USER_RESOURCE, $user_id, $update_data);
        return $this->getUser($obj_user->user->user_id);
    }

    public function validateUser($user_data) {
        $required_fields = array(
            'firstname',
            'lastname',
            'email'
        );

        $valid_data = $this->validateResource($user_data, $required_fields);

        if (!isset($valid_data['zipcode']) && (!isset($valid_data['city']) && !isset($valid_data['state']))) {
            throw new Exception('Missing location data for new user. Please include either a zipcode, or a city and state.');
        }

        return $valid_data;
    }

    /** Circles */
    public function getCircle($circle_id) {
        $result = $this->getResource(self::CIRCLE_RESOURCE, $circle_id);
        return $result->circle;
    }

    public function getCircles($circle_ids) {
        $result = $this->getResource(self::CIRCLE_RESOURCE, $circle_ids);
        return $result->circles;
    }

    public function getCircleJobs($circle_id, $offset = 0, $limit = 10) {
        $params = array(
            'offset' => $offset,
            'limit' => $limit
        );
        $result = $this->getPosessions(self::CIRCLE_RESOURCE, $circle_id, self::JOBS_POSESSION, $params);
        return $result->jobs;
    }

    public function getCircleStories($circle_id) {
        $result = $this->getPosessions(self::CIRCLE_RESOURCE, $circle_id, self::STORIES_POSESSION);
        return $result->stories;
    }

    public function getCircleMembers($circle_id) {
        $result = $this->getPosessions(self::CIRCLE_RESOURCE, $circle_id, self::USERS_POSESSION);
        return $result->users;
    }

    public function createCircle($circle_data) {
        $valid_data = $this->validateCircle($circle_data);
        $result = $this->createResource(self::CIRCLE_RESOURCE, $valid_data);
        return $result->circle;
    }

    public function postCircleStory($circle_id, $story_data) {
        $valid_data = $this->validateStory($story_data);
        $result = $this->createPosession(self::CIRCLE_RESOURCE, $circle_id, self::STORIES_POSESSION, $valid_data);
        return $result->story;
    }

    public function validateCircle($circle_data) {
        $required_fields = array(
            'circle_name'
        );

        $valid_data = $this->validateResource($circle_data, $required_fields);
        return $valid_data;
    }

    public function updateCircle($circle_id, $update_data) {
        $result = $this->updateResource(self::CIRCLE_RESOURCE, $circle_id, $update_data);
        $circle = $this->getCircle($result->circle->circle_id);
        return $circle;
    }

    /** STORIES */
    public function getStory($story_id) {
        $result = $this->getResource(self::STORY_RESOURCE, $story_id);
        return $result->story;
    }

    public function getStories($story_ids) {
        $result = $this->getResource(self::STORY_RESOURCE, $story_ids);
        return $result->stories;
    }

    public function postStory($story_data) {
        $valid_data = $this->validateStory($story_data);
        $result = $this->createResource(self::STORY_RESOURCE, $valid_data);
        return $result->story;
    }

    public function updateStory($story_id, $story_data) {
        $result = $this->updateResource(self::STORY_RESOURCE, $story_id, $story_data);
        $story = $this->getStory($result->story->story_id);
        return $story;
    }

    public function updateStories($story_ids, $story_data) {
        $updated_story_ids = array();
        $result = $this->updateResource(self::STORY_RESOURCE, $story_ids, $story_data);
        foreach($result->stories as $story) {
            $updated_story_ids[]=$story->story_id;
        }
        $stories = $this->getStories($updated_story_ids);
        return $stories;
    }

    public function validateStory($story_data) {
        $required_fields = array(
            'title',
            'story'
        );

        return $this->validateResource($story_data, $required_fields);
    }
}