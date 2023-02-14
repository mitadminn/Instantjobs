<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\ListMavenArtifactsResponse;
use Google\Service\ArtifactRegistry\MavenArtifact;

/**
 * The "mavenArtifacts" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $mavenArtifacts = $artifactregistryService->mavenArtifacts;
 *  </code>
 */
class ProjectsLocationsRepositoriesMavenArtifacts extends \Google\Service\Resource
{
  /**
   * Gets a maven artifact. (mavenArtifacts.get)
   *
   * @param string $name Required. The name of the maven artifact.
   * @param array $optParams Optional parameters.
   * @return MavenArtifact
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], MavenArtifact::class);
  }
  /**
   * Lists maven artifacts.
   * (mavenArtifacts.listProjectsLocationsRepositoriesMavenArtifacts)
   *
   * @param string $parent Required. The name of the parent resource whose maven
   * artifacts will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of artifacts to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return ListMavenArtifactsResponse
   */
  public function listProjectsLocationsRepositoriesMavenArtifacts($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMavenArtifactsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRepositoriesMavenArtifacts::class, 'Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesMavenArtifacts');
