import Vue from 'vue'
import { shallowMount } from '@vue/test-utils'
import Counter from '../../resources/js/components/Counter.vue'

const expect = require('expect')

describe('Counter.vue', () => {
  it('increments count when button is clicked', done => {
    var testValue = 1
    const wrapper = shallowMount(Counter, {
      propsData: {
        count: testValue
      }
    })
    expect(wrapper.props().count).toBe(1)
    expect(wrapper.vm.cnt).toBe(1)
    expect(wrapper.find('button').trigger('click'))
    expect(wrapper.vm.cnt).toBe(2)
    expect(wrapper.find('button').trigger('click'))
    expect(wrapper.vm.cnt).toBe(3)
    Vue.nextTick(() => {
      expect(wrapper.find('span').text()).toMatch('3')
      done()
    })
  })
})
