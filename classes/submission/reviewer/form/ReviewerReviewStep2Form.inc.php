<?php

/**
 * @file classes/submission/reviewer/form/ReviewerReviewStep2Form.inc.php
 *
 * Copyright (c) 2003-2013 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class ReviewerReviewStep2Form
 * @ingroup submission_reviewer_form
 *
 * @brief Form for Step 2 of a review.
 */

import('lib.pkp.classes.submission.reviewer.form.ReviewerReviewForm');

class ReviewerReviewStep2Form extends ReviewerReviewForm {
	/**
	 * Constructor.
	 * @param $reviewerSubmission ReviewerSubmission
	 */
	function ReviewerReviewStep2Form($request, $reviewerSubmission, $reviewAssignment) {
		parent::ReviewerReviewForm($request, $reviewerSubmission, $reviewAssignment, 2);
	}


	//
	// Implement protected template methods from Form
	//
	/**
	 * @see Form::fetch()
	 */
	function fetch($request) {
		$templateMgr = TemplateManager::getManager($request);
		$context = $this->request->getContext();

		$reviewerGuidelines = $context->getLocalizedSetting('reviewGuidelines');
		if (empty($reviewerGuidelines)) {
			$reviewerGuidelines = __('reviewer.submission.noGuidelines');
		}
		$templateMgr->assign('reviewerGuidelines', $reviewerGuidelines);

		return parent::fetch($request);
	}


	/**
	 * @see Form::execute()
	 */
	function execute() {
		// Set review to next step.
		$this->updateReviewStepAndSaveSubmission($this->getReviewerSubmission());
	}

}

?>
