/*  Copyright (c) 2000-2006 hamcrest.org
 */
package org.hamcrest;

/**
 * BaseClass for all Matcher implementations.
 *
 * @see Matcher
 */
public abstract class BaseMatcher<T> implements Matcher<T> {

    /**
     * @see Matcher#_dont_implement_Matcher___instead_extend_BaseMatcher_()
     */
    public final void _dont_implement_Matcher___instead_extend_BaseMatcher_() {
        // See Matcher interface for an explanation of this method.
    }

    public boolean matches(Object item) {
    	return matches(item, MismatchDescription.NONE);
    }

    public boolean matches(Object item, MismatchDescription description) {
    	return matches(item);
    }

    @Override
    public String toString() {
        return StringDescription.toString(this);
    }
}